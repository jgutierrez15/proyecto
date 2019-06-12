<?php

if(isset($_GET["id_categoria"])){
	include "../db.php";
	$img = get_categoria($_GET["id_categoria"]);
	if($img!=null){
		del_categoria($img->id_categoria);
		unlink($img->folder.$img->src);
		header("Location: ../categorias.php");


	}
}


?>