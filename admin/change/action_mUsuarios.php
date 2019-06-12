<?php

include "../db.php";

include "../class.upload.php";


function Modificar_usuario($id,$usuario,$pass,$nombre,$tipo,$folder,$image){
  $con = con();
  $con->query("update users SET  user= '".$usuario."', pass='".$pass."', nom_user='".$nombre."',id_tipo_user='".$tipo."', folder='".$folder."',src='".$image."' WHERE codigo_user='".$id."' ");
}
/// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$handle = new Upload($_FILES["imagen_nueva"]);
 
    $handle->Process("../uploads/");
  if ($handle->processed) {
      // usamos la funcion insert_img de la libreria db.php
      Modificar_usuario($_POST["codigo"],$_POST["user"],$_POST["contraseña"],$_POST["nombre"],1,"uploads/",$handle->file_dst_name);
  } else {  
    Modificar_usuario($_POST["codigo"],$_POST["user"],$_POST["contraseña"],$_POST["nombre"],1,"uploads/",$_POST["imagenow"]);
  }
  unset($handle);
header("Location:../gestion_usuarios.php");



?>
