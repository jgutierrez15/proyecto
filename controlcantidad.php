<?php 

session_start();


    $nuevacantidad = $_REQUEST['qty'];

 
 $_SESSION['qty']=5;

 echo $nuevacantidad;

?>