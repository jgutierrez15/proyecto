<?php

if(isset($_GET["id_sld_principal"])){
	include "../db.php";
	$img = get_slider_principal($_GET["id_sld_principal"]);
	if($img!=null){
		del_slider_principal($img->id_sld_principal);
		unlink($img->folder.$img->src);
		header("Location: ../slidep.php");


	}
}


?>