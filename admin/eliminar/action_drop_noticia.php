<?php

if(isset($_GET["cod_noticia"])){
	include "../db.php";
	$img = get_noticia($_GET["cod_noticia"]);
	if($img!=null){
		del_noticia($img->cod_noticia);
		unlink($img->folder.$img->src);
		header("Location: ../noticias.php");


	}
}


?>