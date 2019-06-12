<?php

if(isset($_GET["id_comentario"])){
	include "../db.php";
	$img = get_comentario($_GET["id_comentario"]);
	if($img!=null){
		del_comentario($img->id_comentario);
		unlink($img->folder.$img->src);
		header("Location: ../../index.php");


	}
}


?>