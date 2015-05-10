<?php
    // Vista para actualización de lista de estados/provincias según el país seleccionado 
    if ($fechacursos > 0)
		echo "<option value=\"\">-- Seleccione --</option>\n";
    foreach ($fechacursos as $key => $value){
        echo "<option value=\"$key\">$value</option>\n";
    }
?>