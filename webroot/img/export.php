<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es" dir="ltr">
<head>
    <link rel="icon" href="./favicon.ico" type="image/x-icon" />
    <link rel="shortcut icon" href="./favicon.ico" type="image/x-icon" />
    <title>phpMyAdmin</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="phpmyadmin.css.php?token=85e1372dadb32a52ff3360e52a3878ab&amp;js_frame=right&amp;nocache=3638955439" />
    <link rel="stylesheet" type="text/css" href="print.css" media="print" />
    <script type="text/javascript">
    // <![CDATA[
    // Updates the title of the frameset if possible (ns4 does not allow this)
    if (typeof(parent.document) != 'undefined' && typeof(parent.document) != 'unknown'
        && typeof(parent.document.title) == 'string') {
        parent.document.title = 'www.terza.com / localhost / terza_catalogo / distribuidores | phpMyAdmin 2.11.2';
    }
    
    // js form validation stuff
    var errorMsg0   = '¡Falta un valor en el formulario!';
    var errorMsg1   = '¡Ésto no es un número!';
    var noDropDbMsg = '';
    var confirmMsg  = 'Realmente desea ';
    var confirmMsgDropDB  = '¡Está a punto de DESTRUIR una base de datos completa!';
    // ]]>
    </script>
    <script src="./js/functions.js" type="text/javascript"></script>
        
    <script src="./js/tooltip.js" type="text/javascript"></script>
    <meta name="OBGZip" content="true" />
        <!--[if IE 6]>
    <style type="text/css">
    /* <![CDATA[ */
    html {
        overflow-y: scroll;
    }
    /* ]]> */
    </style>
    <![endif]-->
</head>

<body>
<div id="TooltipContainer" onmouseover="holdTooltip();" onmouseout="swapTooltip('default');"></div>
    <div id="serverinfo">
<a href="main.php?token=85e1372dadb32a52ff3360e52a3878ab" class="item">        <img class="icon" src="./themes/original/img/s_host.png" width="16" height="16" alt="" /> 
Servidor: localhost</a>
        <span class="separator"><img class="icon" src="./themes/original/img/item_ltr.png" width="5" height="9" alt="-" /></span>
<a href="db_structure.php?db=terza_catalogo&amp;token=85e1372dadb32a52ff3360e52a3878ab" class="item">        <img class="icon" src="./themes/original/img/s_db.png" width="16" height="16" alt="" /> 
Base de datos: terza_catalogo</a>
        <span class="separator"><img class="icon" src="./themes/original/img/item_ltr.png" width="5" height="9" alt="-" /></span>
<a href="tbl_structure.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab" class="item">        <img class="icon" src="./themes/original/img/s_tbl.png" width="16" height="16" alt="" /> 
Tabla: distribuidores</a>
<span class="table_comment" id="span_table_comment">&quot;InnoDB free: 11264 kB&quot;</span>
</div><div id="topmenucontainer">
<ul id="topmenu">
<li><a class="tab" href="sql.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php&amp;pos=0" ><img class="icon" src="./themes/original/img/b_browse.png" width="16" height="16" alt="Examinar" />Examinar</a></li>
<li><a class="tab" href="tbl_structure.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php" ><img class="icon" src="./themes/original/img/b_props.png" width="16" height="16" alt="Estructura" />Estructura</a></li>
<li><a class="tab" href="tbl_sql.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php" ><img class="icon" src="./themes/original/img/b_sql.png" width="16" height="16" alt="SQL" />SQL</a></li>
<li><a class="tab" href="tbl_select.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php" ><img class="icon" src="./themes/original/img/b_search.png" width="16" height="16" alt="Buscar" />Buscar</a></li>
<li><a class="tab" href="tbl_change.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php" ><img class="icon" src="./themes/original/img/b_insrow.png" width="16" height="16" alt="Insertar" />Insertar</a></li>
<li class="active"><a class="tabactive" href="tbl_export.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php&amp;single_table=true" ><img class="icon" src="./themes/original/img/b_tblexport.png" width="16" height="16" alt="Exportar" />Exportar</a></li>
<li><a class="tab" href="tbl_import.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php" ><img class="icon" src="./themes/original/img/b_tblimport.png" width="16" height="16" alt="Importar" />Importar</a></li>
<li><a class="tab" href="tbl_operations.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php" ><img class="icon" src="./themes/original/img/b_tblops.png" width="16" height="16" alt="Operaciones" />Operaciones</a></li>
<li><a class="tabcaution" href="sql.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php&amp;sql_query=TRUNCATE+TABLE+%60distribuidores%60&amp;zero_rows=Se+ha+vaciado+la+tabla+distribuidores&amp;goto=tbl_structure.php" onclick="return confirmLink(this, 'TRUNCATE TABLE `distribuidores`')"><img class="icon" src="./themes/original/img/b_empty.png" width="16" height="16" alt="Vaciar" />Vaciar</a></li>
<li><a class="tabcaution" href="sql.php?db=terza_catalogo&amp;table=distribuidores&amp;token=85e1372dadb32a52ff3360e52a3878ab&amp;goto=tbl_export.php&amp;back=tbl_export.php&amp;reload=1&amp;purge=1&amp;sql_query=DROP+TABLE+%60distribuidores%60&amp;goto=db_structure.php&amp;zero_rows=Se+ha+eliminado+la+tabla+distribuidores" onclick="return confirmLink(this, 'DROP TABLE `distribuidores`')"><img class="icon" src="./themes/original/img/b_deltbl.png" width="16" height="16" alt="Eliminar" />Eliminar</a></li>
</ul>
<div class="clearfloat"></div></div>

<script type="text/javascript">
//<![CDATA[
window.parent.updateTableTitle('terza_catalogo.distribuidores', 'InnoDB free: 11264 kB (296 Filas)');
//]]>
</script>
<br />
<div align="left">
<div class="error">
<h1>Error</h1>
<div class="notice">El formato de exportación seleccionado ¡debe grabarse en el archivo!</div></div></div><br />
<br />

<form method="post" action="export.php" name="dump">

    <input type="hidden" name="db" value="terza_catalogo" />
    <input type="hidden" name="table" value="distribuidores" />
    <input type="hidden" name="token" value="85e1372dadb32a52ff3360e52a3878ab" />
<input type="hidden" name="single_table" value="TRUE" />
<input type="hidden" name="export_type" value="table" />

    <script type="text/javascript">
    //<![CDATA[
    function hide_them_all() {
        document.getElementById("csv_options").style.display = "none";
document.getElementById("excel_options").style.display = "none";
document.getElementById("htmlexcel_options").style.display = "none";
document.getElementById("htmlword_options").style.display = "none";
document.getElementById("latex_options").style.display = "none";
document.getElementById("ods_options").style.display = "none";
document.getElementById("odt_options").style.display = "none";
document.getElementById("pdf_options").style.display = "none";
document.getElementById("sql_options").style.display = "none";
document.getElementById("xml_options").style.display = "none";
document.getElementById("yaml_options").style.display = "none";

    }

    function init_options() {
        hide_them_all();
        if (document.getElementById("radio_plugin_csv").checked) {
document.getElementById("csv_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_excel").checked) {
document.getElementById("excel_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_htmlexcel").checked) {
document.getElementById('checkbox_dump_asfile').checked = true;
document.getElementById("htmlexcel_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_htmlword").checked) {
document.getElementById('checkbox_dump_asfile').checked = true;
document.getElementById("htmlword_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_latex").checked) {
document.getElementById("latex_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_ods").checked) {
document.getElementById('checkbox_dump_asfile').checked = true;
document.getElementById("ods_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_odt").checked) {
document.getElementById('checkbox_dump_asfile').checked = true;
document.getElementById("odt_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_pdf").checked) {
document.getElementById('checkbox_dump_asfile').checked = true;
document.getElementById("pdf_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_sql").checked) {
document.getElementById("sql_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_xml").checked) {
document.getElementById("xml_options").style.display = "block";
 } else 
if (document.getElementById("radio_plugin_yaml").checked) {
document.getElementById('checkbox_dump_asfile').checked = true;
document.getElementById("yaml_options").style.display = "block";
 } else 

        {
            ;
        }
    }

    function match_file(fname) {
        farr = fname.toLowerCase().split(".");
        if (farr.length != 0) {
            len = farr.length
            if (farr[len - 1] == "gz" || farr[len - 1] == "bz2" || farr[len -1] == "zip") len--;
            switch (farr[len - 1]) {
                case "csv" :document.getElementById("radio_plugin_csv").checked = true;init_options();break;
case "csv" :document.getElementById("radio_plugin_excel").checked = true;init_options();break;
case "xls" :document.getElementById("radio_plugin_htmlexcel").checked = true;init_options();break;
case "doc" :document.getElementById("radio_plugin_htmlword").checked = true;init_options();break;
case "tex" :document.getElementById("radio_plugin_latex").checked = true;init_options();break;
case "ods" :document.getElementById("radio_plugin_ods").checked = true;init_options();break;
case "odt" :document.getElementById("radio_plugin_odt").checked = true;init_options();break;
case "pdf" :document.getElementById("radio_plugin_pdf").checked = true;init_options();break;
case "sql" :document.getElementById("radio_plugin_sql").checked = true;init_options();break;
case "xml" :document.getElementById("radio_plugin_xml").checked = true;init_options();break;
case "yml" :document.getElementById("radio_plugin_yaml").checked = true;init_options();break;

            }
        }
    }
    //]]>
    </script>
    <fieldset id="fieldsetexport">
<legend>Mostrar el volcado esquema de la tabla</legend>

<table><tr><td>

<div id="div_container_exportoptions">
<fieldset id="exportoptions">
<legend>Exportar</legend>

    <!-- csv -->
<input type="radio" name="what" value="csv" id="radio_plugin_csv" onclick="if(this.checked) { hide_them_all(); document.getElementById('csv_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_csv">Datos CSV </label>
<br /><br />
<!-- excel -->
<input type="radio" name="what" value="excel" id="radio_plugin_excel" onclick="if(this.checked) { hide_them_all(); document.getElementById('excel_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_excel">CSV para datos de MS Excel</label>
<br /><br />
<!-- htmlexcel -->
<input type="radio" name="what" value="htmlexcel" id="radio_plugin_htmlexcel" onclick="if(this.checked) { hide_them_all();document.getElementById('checkbox_dump_asfile').checked = true; document.getElementById('htmlexcel_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_htmlexcel">Microsoft Excel 2000</label>
<br /><br />
<!-- htmlword -->
<input type="radio" name="what" value="htmlword" id="radio_plugin_htmlword" onclick="if(this.checked) { hide_them_all();document.getElementById('checkbox_dump_asfile').checked = true; document.getElementById('htmlword_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_htmlword">Microsoft Word 2000</label>
<br /><br />
<!-- latex -->
<input type="radio" name="what" value="latex" id="radio_plugin_latex" onclick="if(this.checked) { hide_them_all(); document.getElementById('latex_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_latex">LaTeX</label>
<br /><br />
<!-- ods -->
<input type="radio" name="what" value="ods" id="radio_plugin_ods" onclick="if(this.checked) { hide_them_all();document.getElementById('checkbox_dump_asfile').checked = true; document.getElementById('ods_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_ods">Hoja de cálculo Open Document</label>
<br /><br />
<!-- odt -->
<input type="radio" name="what" value="odt" id="radio_plugin_odt" onclick="if(this.checked) { hide_them_all();document.getElementById('checkbox_dump_asfile').checked = true; document.getElementById('odt_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_odt">Texto Open Document</label>
<br /><br />
<!-- pdf -->
<input type="radio" name="what" value="pdf" id="radio_plugin_pdf" onclick="if(this.checked) { hide_them_all();document.getElementById('checkbox_dump_asfile').checked = true; document.getElementById('pdf_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_pdf">PDF</label>
<br /><br />
<!-- sql -->
<input type="radio" name="what" value="sql" id="radio_plugin_sql" onclick="if(this.checked) { hide_them_all(); document.getElementById('sql_options').style.display = 'block'; }; return true" checked="checked"/>
<label for="radio_plugin_sql">SQL</label>
<br /><br />
<!-- xml -->
<input type="radio" name="what" value="xml" id="radio_plugin_xml" onclick="if(this.checked) { hide_them_all(); document.getElementById('xml_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_xml">XML</label>
<br /><br />
<!-- yaml -->
<input type="radio" name="what" value="yaml" id="radio_plugin_yaml" onclick="if(this.checked) { hide_them_all();document.getElementById('checkbox_dump_asfile').checked = true; document.getElementById('yaml_options').style.display = 'block'; }; return true"/>
<label for="radio_plugin_yaml">YAML</label>
<br /><br />
</fieldset>
</div>

</td><td>

<div id="div_container_sub_exportoptions">
<fieldset id="csv_options" class="options"><legend>Opciones</legend>
<div class="formelementrow">
<label for="text_csv_separator" class="desc">Campos terminados en</label><input type="text" name="csv_separator" value=";" id="text_csv_separator" /></div>


<div class="formelementrow">
<label for="text_csv_enclosed" class="desc">Campos encerrados por</label><input type="text" name="csv_enclosed" value="&quot;" id="text_csv_enclosed" /></div>


<div class="formelementrow">
<label for="text_csv_escaped" class="desc">Caracter de escape</label><input type="text" name="csv_escaped" value="\" id="text_csv_escaped" /></div>


<div class="formelementrow">
<label for="text_csv_terminated" class="desc">Líneas terminadas en</label><input type="text" name="csv_terminated" value="AUTO" id="text_csv_terminated" /></div>


<div class="formelementrow">
<label for="text_csv_null" class="desc">Reemplazar NULL con</label><input type="text" name="csv_null" value="NULL" id="text_csv_null" /></div>


<div class="formelementrow">
<input type="checkbox" name="csv_columns" value="something" id="checkbox_csv_columns"  /><label for="checkbox_csv_columns">Poner los nombres de campo en la primera hilera</label></div>


<input type="hidden" name="csv_data" value="" />
</fieldset><fieldset id="excel_options" class="options"><legend>Opciones</legend>
<div class="formelementrow">
<label for="text_excel_null" class="desc">Reemplazar NULL con</label><input type="text" name="excel_null" value="NULL" id="text_excel_null" /></div>


<div class="formelementrow">
<input type="checkbox" name="excel_columns" value="something" id="checkbox_excel_columns"  /><label for="checkbox_excel_columns">Poner los nombres de campo en la primera hilera</label></div>


<div class="formelementrow">
<label for="select_excel_edition" class="desc">Edición Excel</label><select name="excel_edition" id="select_excel_edition"><option name="win" selected="selected">Windows</option><option name="mac">Excel 2003 / Macintosh</option></select></div>


<input type="hidden" name="excel_data" value="" />
</fieldset><fieldset id="htmlexcel_options" class="options"><legend>Opciones</legend>
<div class="formelementrow">
<label for="text_htmlexcel_null" class="desc">Reemplazar NULL con</label><input type="text" name="htmlexcel_null" value="NULL" id="text_htmlexcel_null" /></div>


<div class="formelementrow">
<input type="checkbox" name="htmlexcel_columns" value="something" id="checkbox_htmlexcel_columns"  /><label for="checkbox_htmlexcel_columns">Poner los nombres de campo en la primera hilera</label></div>


<input type="hidden" name="htmlexcel_data" value="" />
</fieldset><fieldset id="htmlword_options" class="options"><legend>Opciones</legend>
<div class="formelementrow">
<input type="checkbox" name="htmlword_structure" value="something" id="checkbox_htmlword_structure"  checked="checked" onclick="if (!this.checked &amp;&amp; (!document.getElementById('checkbox_htmlword_data') || !document.getElementById('checkbox_htmlword_data').checked)) return false; else return true;" /><label for="checkbox_htmlword_structure">Estructura</label></div>


<fieldset><legend><input type="checkbox" name="htmlword_data" value="something" id="checkbox_htmlword_data"  checked="checked" onclick="if (!this.checked &amp;&amp; (!document.getElementById('checkbox_htmlword_structure') || !document.getElementById('checkbox_htmlword_structure').checked)) return false; else return true;" /><label for="checkbox_htmlword_data">Datos</label></legend>

<div class="formelementrow">
<label for="text_htmlword_null" class="desc">Reemplazar NULL con</label><input type="text" name="htmlword_null" value="NULL" id="text_htmlword_null" /></div>


<div class="formelementrow">
<input type="checkbox" name="htmlword_columns" value="something" id="checkbox_htmlword_columns"  /><label for="checkbox_htmlword_columns">Poner los nombres de campo en la primera hilera</label></div>


</fieldset>
</fieldset><fieldset id="latex_options" class="options"><legend>Opciones</legend>
<div class="formelementrow">
<input type="checkbox" name="latex_caption" value="something" id="checkbox_latex_caption"  checked="checked" /><label for="checkbox_latex_caption">Incluir el subtitulado de la tabla</label></div>


<fieldset><legend><input type="checkbox" name="latex_structure" value="something" id="checkbox_latex_structure"  checked="checked" onclick="if (!this.checked &amp;&amp; (!document.getElementById('checkbox_latex_data') || !document.getElementById('checkbox_latex_data').checked)) return false; else return true;" /><label for="checkbox_latex_structure">Estructura</label></legend>

<div class="formelementrow">
<label for="text_latex_structure_caption" class="desc">Subtitulado de la tabla</label><input type="text" name="latex_structure_caption" value="Estructura de la tabla __TABLE__" id="text_latex_structure_caption" /></div>


<div class="formelementrow">
<label for="text_latex_structure_continued_caption" class="desc">Continuación del subtitulado de la tabla</label><input type="text" name="latex_structure_continued_caption" value="Estructura de la tabla __TABLE__ (continúa)" id="text_latex_structure_continued_caption" /></div>


<div class="formelementrow">
<label for="text_latex_structure_label" class="desc">Clave de la etiqueta</label><input type="text" name="latex_structure_label" value="tab:__TABLE__-structure" id="text_latex_structure_label" /></div>


<div class="formelementrow">
<input type="checkbox" name="latex_comments" value="something" id="checkbox_latex_comments"  checked="checked" /><label for="checkbox_latex_comments">Comentarios</label></div>


</fieldset>

<fieldset><legend><input type="checkbox" name="latex_data" value="something" id="checkbox_latex_data"  checked="checked" onclick="if (!this.checked &amp;&amp; (!document.getElementById('checkbox_latex_structure') || !document.getElementById('checkbox_latex_structure').checked)) return false; else return true;" /><label for="checkbox_latex_data">Datos</label></legend>

<div class="formelementrow">
<input type="checkbox" name="latex_columns" value="something" id="checkbox_latex_columns"  checked="checked" /><label for="checkbox_latex_columns">Poner los nombres de campo en la primera hilera</label></div>


<div class="formelementrow">
<label for="text_latex_data_caption" class="desc">Subtitulado de la tabla</label><input type="text" name="latex_data_caption" value="Contenido de la tabla __TABLE__" id="text_latex_data_caption" /></div>


<div class="formelementrow">
<label for="text_latex_data_continued_caption" class="desc">Continuación del subtitulado de la tabla</label><input type="text" name="latex_data_continued_caption" value="Contenido de la tabla __TABLE__ (continúa)" id="text_latex_data_continued_caption" /></div>


<div class="formelementrow">
<label for="text_latex_data_label" class="desc">Clave de la etiqueta</label><input type="text" name="latex_data_label" value="tab:__TABLE__-data" id="text_latex_data_label" /></div>


<div class="formelementrow">
<label for="text_latex_null" class="desc">Reemplazar NULL con</label><input type="text" name="latex_null" value="\textit{NULL}" id="text_latex_null" /></div>


</fieldset>
</fieldset><fieldset id="ods_options" class="options"><legend>Opciones</legend>
<div class="formelementrow">
<label for="text_ods_null" class="desc">Reemplazar NULL con</label><input type="text" name="ods_null" value="NULL" id="text_ods_null" /></div>


<div class="formelementrow">
<input type="checkbox" name="ods_columns" value="something" id="checkbox_ods_columns"  /><label for="checkbox_ods_columns">Poner los nombres de campo en la primera hilera</label></div>


<input type="hidden" name="ods_data" value="" />
</fieldset><fieldset id="odt_options" class="options"><legend>Opciones</legend>
<fieldset><legend><input type="checkbox" name="odt_structure" value="something" id="checkbox_odt_structure"  checked="checked" onclick="if (!this.checked &amp;&amp; (!document.getElementById('checkbox_odt_data') || !document.getElementById('checkbox_odt_data').checked)) return false; else return true;" /><label for="checkbox_odt_structure">Estructura</label></legend>

<div class="formelementrow">
<input type="checkbox" name="odt_comments" value="something" id="checkbox_odt_comments"  checked="checked" /><label for="checkbox_odt_comments">Comentarios</label></div>


</fieldset>

<fieldset><legend><input type="checkbox" name="odt_data" value="something" id="checkbox_odt_data"  checked="checked" onclick="if (!this.checked &amp;&amp; (!document.getElementById('checkbox_odt_structure') || !document.getElementById('checkbox_odt_structure').checked)) return false; else return true;" /><label for="checkbox_odt_data">Datos</label></legend>

<div class="formelementrow">
<input type="checkbox" name="odt_columns" value="something" id="checkbox_odt_columns"  checked="checked" /><label for="checkbox_odt_columns">Poner los nombres de campo en la primera hilera</label></div>


<div class="formelementrow">
<label for="text_odt_null" class="desc">Reemplazar NULL con</label><input type="text" name="odt_null" value="NULL" id="text_odt_null" /></div>


</fieldset>
</fieldset><fieldset id="pdf_options" class="options"><legend>Opciones</legend>
<div class="formelementrow">
<label for="text_pdf_explanation" class="desc">(Genera un reporte conteniendo los datos de una sola tabla)</label></div>


<div class="formelementrow">
<label for="text_pdf_report_title" class="desc">Título del reporte</label><input type="text" name="pdf_report_title" value="" id="text_pdf_report_title" /></div>


<input type="hidden" name="pdf_data" value="1" />
</fieldset><fieldset id="sql_options" class="options"><legend>Opciones</legend>
<div class="formelementrow">
<label for="text_sql_header_comment" class="desc">Añadir su propio comentario en el encabezado (\n segmenta las oraciones)</label><input type="text" name="sql_header_comment" value="" id="text_sql_header_comment" /></div>


<div class="formelementrow">
<input type="checkbox" name="sql_use_transaction" value="something" id="checkbox_sql_use_transaction"  /><label for="checkbox_sql_use_transaction">Incluir lo exportado en una transacción</label></div>


<div class="formelementrow">
<input type="checkbox" name="sql_disable_fk" value="something" id="checkbox_sql_disable_fk"  /><label for="checkbox_sql_disable_fk">Deshabilitar la revisión de las llaves extranjeras (foreign keys)</label></div>


<div class="formelementrow">
<label for="select_sql_compatibility" class="desc">Modalidad compatible con SQL</label><select name="sql_compatibility" id="select_sql_compatibility"><option name="NONE" selected="selected">NONE</option><option name="ANSI">ANSI</option><option name="DB2">DB2</option><option name="MAXDB">MAXDB</option><option name="MYSQL323">MYSQL323</option><option name="MYSQL40">MYSQL40</option><option name="MSSQL">MSSQL</option><option name="ORACLE">ORACLE</option><option name="TRADITIONAL">TRADITIONAL</option></select></div>
<a href="http://dev.mysql.com/doc/refman/5.0/es/server-sql-mode.html" target="mysql_doc"><img class="icon" src="./themes/original/img/b_help.png" width="11" height="11" alt="Documentación" title="Documentación" /></a>

<fieldset><legend><input type="checkbox" name="sql_structure" value="something" id="checkbox_sql_structure"  checked="checked" onclick="if (!this.checked &amp;&amp; (!document.getElementById('checkbox_sql_data') || !document.getElementById('checkbox_sql_data').checked)) return false; else return true;" /><label for="checkbox_sql_structure">Estructura</label></legend>

<div class="formelementrow">
<input type="checkbox" name="sql_drop_table" value="something" id="checkbox_sql_drop_table"  /><label for="checkbox_sql_drop_table">Añada DROP TABLE</label></div>


<div class="formelementrow">
<input type="checkbox" name="sql_if_not_exists" value="something" id="checkbox_sql_if_not_exists"  checked="checked" /><label for="checkbox_sql_if_not_exists">Añada IF NOT EXISTS</label></div>


<div class="formelementrow">
<input type="checkbox" name="sql_auto_increment" value="something" id="checkbox_sql_auto_increment"  checked="checked" /><label for="checkbox_sql_auto_increment">Añadir el valor AUTO_INCREMENT</label></div>


<div class="formelementrow">
<input type="checkbox" name="sql_backquotes" value="something" id="checkbox_sql_backquotes"  checked="checked" /><label for="checkbox_sql_backquotes">Usar "backquotes" con tablas y nombres de campo</label></div>


<div class="formelementrow">
<input type="checkbox" name="sql_procedure_function" value="something" id="checkbox_sql_procedure_function"  /><label for="checkbox_sql_procedure_function">Añada CREATE PROCEDURE / FUNCTION</label></div>


<fieldset><legend>Añadir en los comentarios</legend>

<div class="formelementrow">
<input type="checkbox" name="sql_dates" value="something" id="checkbox_sql_dates"  /><label for="checkbox_sql_dates">Fechas de creación/actualización/revisión</label></div>


</fieldset>

</fieldset>

<fieldset><legend><input type="checkbox" name="sql_data" value="something" id="checkbox_sql_data"  checked="checked" onclick="if (!this.checked &amp;&amp; (!document.getElementById('checkbox_sql_structure') || !document.getElementById('checkbox_sql_structure').checked)) return false; else return true;" /><label for="checkbox_sql_data">Datos</label></legend>

<div class="formelementrow">
<input type="checkbox" name="sql_columns" value="something" id="checkbox_sql_columns"  checked="checked" /><label for="checkbox_sql_columns">Completar los INSERTS</label></div>


<div class="formelementrow">
<input type="checkbox" name="sql_extended" value="something" id="checkbox_sql_extended"  checked="checked" /><label for="checkbox_sql_extended">INSERTs extendidos</label></div>


<div class="formelementrow">
<label for="text_sql_max_query_size" class="desc">Longitud máxima de la consulta creada</label><input type="text" name="sql_max_query_size" value="50000" id="text_sql_max_query_size" /></div>


<div class="formelementrow">
<input type="checkbox" name="sql_delayed" value="something" id="checkbox_sql_delayed"  /><label for="checkbox_sql_delayed">Usar "inserts" con retraso</label></div>


<div class="formelementrow">
<input type="checkbox" name="sql_ignore" value="something" id="checkbox_sql_ignore"  /><label for="checkbox_sql_ignore">Usar la opción ignore inserts</label></div>


<div class="formelementrow">
<input type="checkbox" name="sql_hex_for_blob" value="something" id="checkbox_sql_hex_for_blob"  checked="checked" /><label for="checkbox_sql_hex_for_blob">Use hexadecimal para BLOB</label></div>


<div class="formelementrow">
<label for="select_sql_type" class="desc">Tipo de exportación</label><select name="sql_type" id="select_sql_type"><option name="0" selected="selected">INSERT</option><option name="1">UPDATE</option><option name="2">REPLACE</option></select></div>


</fieldset>
</fieldset><fieldset id="xml_options" class="options"><legend>Opciones</legend>
<input type="hidden" name="xml_data" value="" />
Este formato no tiene opciones</fieldset><fieldset id="yaml_options" class="options"><legend>Opciones</legend>
<input type="hidden" name="yaml_data" value="" />
Este formato no tiene opciones</fieldset></div>
</td></tr></table>

<script type="text/javascript">
//<![CDATA[
    init_options();
//]]>
</script>

    <div class="formelementrow">
        Volcar <input type="text" name="limit_to" size="5" value="340" onfocus="this.select()" /> filas empezando por la fila <input type="text" name="limit_from" value="0" size="5" onfocus="this.select()" /> .    </div>
</fieldset>

<fieldset>
    <legend>
        <input type="checkbox" name="asfile" value="sendit"
            id="checkbox_dump_asfile"  />
        <label for="checkbox_dump_asfile">Enviar (genera un archivo descargable)</label>
    </legend>

    
    <label for="filename_template">
        Plantilla del nombre del archivo        <sup>(1)</sup></label>:
    <input type="text" name="filename_template" id="filename_template"
     value="__TABLE__" />
    (
    <input type="checkbox" name="remember_template"
        id="checkbox_remember_template"
         checked="checked" />
    <label for="checkbox_remember_template">
        recordar la plantilla</label>
    )

    <div class="formelementrow">
        </div>

    <input type="hidden" name="compression" value="none" />
</fieldset>


<fieldset class="tblFooters">
    <input type="submit" value="Continuar" id="buttonGo" />
</fieldset>
</form>

<div class="notice">
    <sup id="FileNameTemplateHelp">(1)</sup>
    Este valor es interpretado usando <a href="http://www.php.net/strftime" target="documentation" title="Documentación">strftime</a>; así, usted puede usar cadenas de caracteres para formatear el tiempo. De manera adicional, sucederán las siguientes transformaciones: __SERVER__/nombre del servidor, __DB__/nombre de la base de datos, __TABLE__/nombre de la tabla. El texto restante se mantendrá como está.</div>
<script type="text/javascript">
//<![CDATA[
// updates current settings
if (window.parent.setAll) {
    window.parent.setAll('es-utf-8', 'utf8_unicode_ci', '1', 'terza_catalogo', 'distribuidores');
}
    // set current db, table and sql query in the querywindow
if (window.parent.reload_querywindow) {
    window.parent.reload_querywindow(
        'terza_catalogo',
        'distribuidores',
        '');
}
    
if (window.parent.frame_content) {
    // reset content frame name, as querywindow needs to set a unique name
    // before submitting form data, and navigation frame needs the original name
    if (typeof(window.parent.frame_content.name) != 'undefined'
     && window.parent.frame_content.name != 'frame_content') {
        window.parent.frame_content.name = 'frame_content';
    }
    if (typeof(window.parent.frame_content.id) != 'undefined'
     && window.parent.frame_content.id != 'frame_content') {
        window.parent.frame_content.id = 'frame_content';
    }
    //window.parent.frame_content.setAttribute('name', 'frame_content');
    //window.parent.frame_content.setAttribute('id', 'frame_content');
}
//]]>
</script>
</body>
</html>
