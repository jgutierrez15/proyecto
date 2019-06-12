<?php

if(isset($_GET["codigo_user"])){
	include "../db.php";
	$img = get_usuario($_GET["codigo_user"]);
	if($img!=null){
		del_usuario($img->codigo_user);
		unlink($img->folder.$img->src);
		header("Location: ../gestion_usuarios.php");


	}
}


?>