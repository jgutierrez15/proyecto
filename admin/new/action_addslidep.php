<?php
include "../db.php";
include "../class.upload.php";

/// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);



$handle = new Upload($_FILES["imagen"]);
if ($handle->uploaded) {
  $handle->Process("../uploads/");
  if ($handle->processed) {
    // usamos la funcion insert_img de la libreria db.php
    insert_sld_principal($_POST["nombre"],"uploads/",$handle->file_dst_name);
  } else {
    echo 'Error: ' . $handle->error;
  }
} else {
  echo 'Error: ' . $handle->error;
}
unset($handle);
header("Location:../slidep.php");


?>