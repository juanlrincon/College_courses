<?php
/**
  * Uploader class handles a single file to be uploaded to the file system
  * 
  * @author: Nick Baker
  * @verion: 4.0.3
  * @link: http://www.webtechnick.com 
  */
class Uploader {
  
  /**
    * File to upload.
    */
  var $file = array();
  
  /**
    * Global options
    * fileTypes to allow to upload
    */
  var $options = array();
  
  /**
    * errors holds any errors that occur as string values.
    * this can be access to debug the FileUploadComponent
    *
    * @var array
    * @access public
    */
  var $errors = array();
  
  /**
    * Definitions of errors that could occur during upload
    * 
    * @author Jon Langevin
    * @var array
    */
  var $uploadErrors = array(
    UPLOAD_ERR_OK => 'There is no error, the file uploaded with success.',
    UPLOAD_ERR_INI_SIZE => 'The uploaded file exceeds the upload_max_filesize directive in php.ini.',
    UPLOAD_ERR_FORM_SIZE => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.',
    UPLOAD_ERR_PARTIAL => 'The uploaded file was only partially uploaded.',
    UPLOAD_ERR_NO_FILE => 'No file was uploaded.',
    UPLOAD_ERR_NO_TMP_DIR => 'Missing a temporary folder.', //Introduced in PHP 4.3.10 and PHP 5.0.3.
    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk.', //Introduced in PHP 5.1.0.
    UPLOAD_ERR_EXTENSION => 'File upload stopped by extension.' //Introduced in PHP 5.2.0.
  );
  
  /**
    * Final file is set on move_uploaded_file success.
    * This is the file name of the final file that was uploaded
    * to the uploadDir directory
    *
    * @var string of final file name uploaded
    * @access public
    */
  var $finalFile = null;

  function __construct($options = array()){
    $this->options = array_merge($this->options, $options);
  }
  
  /**
    * processFile will take a file, or use the current file given to it
    * and attempt to save the file to the file system.
    * processFile will check to make sure the file is there, and its type is allowed to be saved.
    * 
    * @param file array of uploaded file (optional)
    * @return String | false String of finalFile name saved to the file system or false if unable to save to file system. 
    * @access public
    */
  function processFile($file = null){
    $this->setFile($file);
    
    //check if we have a file and if we allow the type, return false otherwise.
    if(!$this->checkFile() || !$this->checkType()){
      return false;
    }
    
    //make sure the file doesn't already exist, if it does, add an itteration to it
    $up_dir = $this->options['uploadDir'];
    $target_path = $up_dir . DS . $this->file['name'];
    $temp_path = substr($target_path, 0, strlen($target_path) - strlen($this->_ext())); //temp path without the ext
    $i=1;
		while(file_exists($target_path)){
			$target_path = $temp_path . "-" . $i . $this->_ext();
			$i++;
		}
    
    //now move the file.
    if(move_uploaded_file($this->file['tmp_name'], $target_path)){
      $this->finalFile = basename($target_path);
      return $this->finalFile;
    }
    else{
      $this->_error('Unable to save temp file to file system.');
      return false;
    }
  }
  
  /**
    * setFile will set a this->file if given one.
    * 
    * @param file array of uploaded file. (optional)
    * @return void
    */
  function setFile($file = null){
    if($file) $this->file = $file;
  }
  
  /**
    * Returns the extension of the uploaded filename.
    *
    * @return string $extension A filename extension
    * @param file array of uploaded file (optional)
    * @access protected
    */
  function _ext($file = null){
    $this->setFile($file);
    return strrchr($this->file['name'],".");
  }
  
  /**
  * Adds error messages to the component
  *
  * @param string $text String of error message to save
  * @return void
  * @access protected
  */
  function _error($text){
    $message = __($text,true);
    $this->errors[] = $message;
  }
  
  /**
  * Checks if the uploaded type is allowed defined in the allowedTypes
  *
  * @return boolean if type is accepted
  * @param file array of uploaded file (optional)
  * @access public
  */
  function checkType($file = null){
    $this->setFile($file);
    foreach($this->options['allowedTypes'] as $value){
      if(strtolower($this->file['type']) == strtolower($value) || $value == '*'){
        return true;
      }
    }
    $this->_error("{$this->file['type']} is not an allowed type.");
    return false;
  }
  
  /**
    * Checks if there is a file uploaded
    *
    * @return void
    * @access public
    * @param file array of uploaded file (optional)
    */
  function checkFile($file = null){
    $this->setFile($file);
    if($this->hasUpload() && $this->file){
      if(isset($this->file['error']) && $this->file['error'] == UPLOAD_ERR_OK ) {
        return true;
      }
      else {
        $this->_error($this->uploadErrors[$this->file['error']]);
      }
    }        
    return false;
  }
  
  /**
    * removeFile removes a specific file from the uploaded directory
    *
    * @param string $name A reference to the filename to delete from the uploadDirectory
    * @return boolean
    * @access public
    */
  function removeFile($name = null){
    if(!$name || strpos($name, '://')){
      return false;
    }
    
    $up_dir = $this->options['uploadDir'];
    $target_path = $up_dir . DS . $name;
    
    //delete main image -- $name
    if(@unlink($target_path)){
      return true;
    } else {
      return false;
    }
  }
  
  /**
    * hasUpload
    * 
    * @return boolean true | false depending if a file was actually uploaded.
    * @param file array of uploaded file (optional)
    */
  function hasUpload($file = null){
    $this->setFile($file);
    return ($this->_multiArrayKeyExists("tmp_name", $this->file));
  }
  
  /**
    * @return boolean true if errors were detected.
    */
  function hasErrors(){
    return count($this->errors);
  }
  
  /**
    * showErrors itterates through the errors array
    * and returns a concatinated string of errors sepearated by
    * the $sep
    *
    * @param string $sep A seperated defaults to <br />
    * @return string
    * @access public
    */
  function showErrors($sep = " "){
    $retval = "";
    foreach($this->errors as $error){
      $retval .= "$error $sep";
    }
    return $retval;
  }
  
  /**
    * Searches through the $haystack for a $key.
    *
    * @param string $needle String of key to search for in $haystack
    * @param array $haystack Array of which to search for $needle
    * @return boolean true if given key is in an array
    * @access protected
    */
  function _multiArrayKeyExists($needle, $haystack) {
    if(is_array($haystack)){
      foreach ($haystack as $key=>$value) {
        if ($needle===$key && $value) {
          return true;
        }
        if (is_array($value)) {
          if($this->_multiArrayKeyExists($needle, $value)){
            return true;
          }
        }
      }
    }
    return false;
  }

}
?>