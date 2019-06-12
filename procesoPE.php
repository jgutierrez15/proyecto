<?php
include "admin/db.php";

function insert_pedidos($ce,$cs,$clie,$desc,$email,$celular,$dni,$precio,$coduser,$estado,$formap){
	$con = con();
	$con->query("insert into pedidos (codigo_entrega,cod_secreto,cliente,descripcion,email,celular,dni,precio_total,codigo_user,id_estado_pedido,id_forma_pago,created_at) value 
	(\"$ce\",\"$cs\",\"$clie\",\"$desc\",\"$email\",\"$celular\",\"$dni\",\"$precio\",\"$coduser\",\"$estado\",\"$formap\",NOW())");
}
/// mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

insert_pedidos($_POST["codentrega"],$_POST["codsecreto"],$_POST["nombre"],$_POST["descripcion"],$_POST["correo"],$_POST["celular"],$_POST["dni"],$_POST["precio"],$_POST["id"],"8","1");


header("Location:RespuestaPE.php");


?>