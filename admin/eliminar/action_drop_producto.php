<?php

if(isset($_GET["id"])){
	include "../db.php";
	$img = get_producto($_GET["id"]);
	if($img!=null){
		del_producto($img->id);
		unlink($img->folder.$img->src);
		header("Location: ../productos.php");


	}
}


?>