<?php

session_start();

if(isset($_POST['submit'])){
    if(empty($_POST['codigosecreto'])){
        echo "<script>alert('Nombre Vacio')</script>";
            }
        else{
            
    $id=$_POST['id'];
 $nombre=$_POST['nombre'];
 $celular=$_POST['celular'];
 $correo=$_POST['correo'];
 $dni=$_POST['dni'];
 $codigosecreto=$_POST['codigosecreto'];
 
 $_SESSION['id']=$id;
 $_SESSION['nombre']=$nombre;
 $_SESSION['celular']=$celular;
 $_SESSION['correo']=$correo;
 $_SESSION['dni']=$dni;
 $_SESSION['codigosecreto']=$codigosecreto;

 header("Location:pagos.php");
}

}

?>