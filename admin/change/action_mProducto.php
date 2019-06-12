<?php

include "../db.php";

include "../class.upload.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function Modificar_Producto($id,$nombre,$precio,$precio_desc,$des,$stock,$folder,$src,$idcategoria){
	$con = con();
	$con->query("update products SET  name= '".$nombre."',
	 price='".$precio."',
	 price_old='".$precio_desc."',
	 description='".$des."',
	 stock='".$stock."', 
	 folder='".$folder."',
	 src='".$src."',
	 id_categoria='".$idcategoria."' WHERE id='".$id."' ");
}
/// mostrar errores


$handle = new Upload($_FILES["imagen_nueva"]);
 
    $handle->Process("../uploads/");
  if ($handle->processed) {
      // usamos la funcion insert_img de la libreria db.php
      Modificar_Producto($_POST["codigo"],$_POST["nombre"],$_POST["precio"],$_POST["descuento"],$_POST["descripcion"],$_POST["stock"],"uploads/",$handle->file_dst_name,$_POST["categoria"]);
  } else {  
 
      Modificar_Producto ($_POST["codigo"],$_POST["nombre"],$_POST["precio"],$_POST["descuento"],$_POST["descripcion"],
 	$_POST["stock"],"uploads/",$_POST["imagenow"],$_POST["categoria"]);
  }
  unset($handle);
header("Location:../productos.php");



?>
