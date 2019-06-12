<?php

include "../db.php";

function Modificar_estadoefectivo($id,$cod){
	$con = con();
	$con->query("update orders SET  id_estado_pedido= '".$cod."' WHERE id='".$id."' ");
}

Modificar_estadoefectivo($_POST['codigo'], $_POST['estado']);

header("Location:../efectivo.php");



?>
