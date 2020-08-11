<?php

$archivo= $_FILES['archivo'];
$nombre= $archivo['name'];
$tipo= $archivo['type'];

//var_dump($archivo);
//die();

if($tipo=="application/vnd.openxmlformats-officedocument.wordprocessingml.document"
 ||$tipo=="application/vnd.openxmlformats-officedocument.presentationml.presentation"
 ||$tipo=="application/pdf"||$tipo=="application/octet-stream"){

    if(!is_dir('./files')){
            mkdir('./files',0777);

    }

    move_uploaded_file($archivo['tmp_name'],'files/'.$nombre);

    Core::alert("El archivo cargó correctamente");
	Core::redir("./?view=upload");

} else {
    
    Core::alert("ALERTA: FORMATO DE ARCHIVO INCORRECTO");
	Core::redir("./?view=upload");
}

?>



