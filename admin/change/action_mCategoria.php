<?php

include "../db.php";

function Modificar_Encabezado( $cod,$nombre){
	$con = con();
	$con->query("update categoria SET  nombre= '".$nombre."' WHERE id_categoria='".$cod."' ");
}

Modificar_Encabezado($_POST['codigo'], $_POST['nombre']);

header("Location:../categorias.php");



?>
