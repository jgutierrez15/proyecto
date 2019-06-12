<?php

include "../db.php";

include "../class.upload.php";


function Modificar_Noticias($id,$nombre,$contenido,$folder,$image){
	$con = con();
	$con->query("update noticias SET  nom_noticia= '".$nombre."', contenido_noticia='".$contenido."', folder='".$folder."',src='".$image."' WHERE cod_noticia='".$id."' ");
}
/// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$handle = new Upload($_FILES["imagen_nueva"]);
 
    $handle->Process("../uploads/");
  if ($handle->processed) {
      // usamos la funcion insert_img de la libreria db.php
      Modificar_Noticias($_POST["codigo"],$_POST["nombre"],$_POST["contenido"],"uploads/",$handle->file_dst_name);
  } else {  
    Modificar_Noticias($_POST["codigo"],$_POST["nombre"],$_POST["contenido"],"uploads/",$_POST["imagenow"]);
  }
  unset($handle);
header("Location:../noticias.php");



?>
