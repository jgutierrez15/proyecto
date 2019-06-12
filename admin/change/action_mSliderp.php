<?php

include "../db.php";

include "../class.upload.php";


function Modificar_slider_principal($id,$nombre,$folder,$image){
	$con = con();
	$con->query("update sld_principal SET  nom_sld_principal= '".$nombre."',folder='".$folder."',src='".$image."' WHERE id_sld_principal='".$id."' ");
}
/// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$handle = new Upload($_FILES["imagen_nueva"]);
 
    $handle->Process("../uploads/");
  if ($handle->processed) {
      // usamos la funcion insert_img de la libreria db.php
      Modificar_slider_principal($_POST["codigo"],$_POST["nombre"],"uploads/",$handle->file_dst_name);
  } else {  
    Modificar_slider_principal($_POST["codigo"],$_POST["nombre"],"uploads/",$_POST["imagenow"]);
  }
  unset($handle);
header("Location:../slidep.php");



?>
