<?php

include "../db.php";

function Modificar_footer( $cod,$direccion,$celular,$telefono,$horario,$facebook,$email){
	$con = con();
	$con->query("update footer SET  direccion_footer= '".$direccion."',cel_footer= '".$direccion."',cel_footer= '".$celular."',tel_footer= '".$telefono."',horarios_footer= '".$horario."',facebook_footer= '".$facebook."',email_footer= '".$email."' WHERE id_footer='".$cod."' ");
}

Modificar_footer($_POST['codigo'], $_POST['direccion'], $_POST['celular'], $_POST['telefono'], $_POST['horario'], $_POST['facebook'], $_POST['email']);

header("Location:../footer.php");



?>
