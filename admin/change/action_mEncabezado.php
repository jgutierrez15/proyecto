<?php

include "../db.php";

function Modificar_Encabezado( $cod,$nombre){
	$con = con();
	$con->query("update sec_encabezado SET  nom_enc= '".$nombre."' WHERE cod_enc='".$cod."' ");
}

Modificar_Encabezado($_POST['codigo'], $_POST['nombre']);

header("Location:../encabezado.php");



?>
