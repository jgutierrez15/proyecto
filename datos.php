<?php
include "admin/db.php";
$db=con();

include "action_datos.php";

$varsesion = $_SESSION['user'];
$encabezados=get_sec_encabezados();
// initializ shopping cart class



error_reporting(0);
$query = $db->query("select*from users where user='$varsesion'");
$row = $query->fetch_assoc();
$_SESSION['sessCustomerID'] = $row['codigo_user'];
$_SESSION['nameUSER'] = $row['nom_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda Dragon Table Tennis</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/superslides.css">
     <link rel="icon" type="image/png" href="images/iconobad.ico" />
     <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
    
     <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Dragon Table Tennis</title>
    <style>
    .container{width: 100%;padding: 50px 110px;}
    .container h1{
      color: darkcyan;
    }
    .table{width: 100%;float: left; font-size: 15px;     font-weight: 700;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    thead{
      color: darkcyan;
    }
    tfoot{
      color: darkcyan;
    }
    </style>
</head>
<body>
<?php include('nav.php') ?>
<?php if($cart->total_items() <= 0){
    header("Location: index.php");
}
 ?>
  <div class="span_fondo ftienda">
  <img style="    width: 100%;

height: 100%;
position: absolute;

    z-index: -5;
" src="images/store.jpg" alt="">
<h1 style="">Productos en carrito</h1>
  </div>
  
    <div class="procesos">
<div class="disablecarrito ">
    <h1><i class="fas fa-list-alt"></i> Productos </h1> 
</div>
<div class="disablecarrito activeproceso">
    <h1><i class="fas fa-address-card"></i> Datos </h1> 
</div>
<div class="disablecarrito">
    <h1><i class="fas fa-pager"></i> Pagar</h1>
</div>
</div>

<h3 class="titulo-pasos-proceso">INGRESA TUS DATOS PERSONALES </h3>
<hr>
<div class="formulariodatos">


<form class="needs-validation form_modif" novalidate action="" method="post">

<div class="form-group">

<div class="content_card">


      <input type="hidden"  value="<?php echo $row["codigo_user"] ?>" name="id" id="id"  >

    
    <label for="exampleInputEmail1">Nombre Completo</label>
    <input type="hidden"   value="<?php echo $row["nom_user"] ?>" name="nombre" id="nombre"  >
      <input type="text" style="    width: 336px; margin: 0 auto;"  disabled  value="<?php echo $row["nom_user"] ?>" class="form-control" name="name" id="name"  >
  </div>



  <div class="form-group">

<label for="exampleInputEmail1"> Celular</label>
<input type="hidden"   value="<?php echo $row["nom_user"] ?>" name="celular" id="celular"  >
  <input type="text" disabled value="<?php echo $row["celular"] ?>" style="    width: 336px; margin: 0 auto;"  class="form-control" id="exampleInputEmail1" id="validationCustom01"  pattern="^[0-9]{9}" >



<div class="invalid-feedback">

El Celular debe tener 9 números

  </div>

</div>

  <div class="form-group">

<label for="exampleInputEmail1"> Dni</label>
<input type="hidden"   value="<?php echo $row["nom_user"] ?>" name="dni" id="dni"  >
  <input type="text" disabled style="    width: 336px; margin: 0 auto;" value="<?php echo $row["dni"] ?>" class="form-control" id="exampleInputEmail1" id="validationCustom01"  pattern="^[0-9]{8}"  >



<div class="invalid-feedback">
El Dni debe tener 8 números

  </div>

</div>




  <div class="form-group">

<label for="exampleInputEmail1"> Correo</label>

  <input type="email"  style="    width: 336px; margin: 0 auto;"  class="form-control" id="exampleInputEmail1" id="validationCustom01"  pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,3})$" placeholder="Ingresa Correo" name="correo" id="correo"  required>



<div class="invalid-feedback">
Ingrese un formato de correo : example@correo.com

  </div>

</div>


<div class="form-group">

<label for="exampleInputEmail1">Por seguridad para la entrega de los productos, escriba un codigo secreto</label>


<input type="password"  style="    width: 336px; margin: 0 auto;"  class="form-control"  pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" name="codigosecreto" id="codigosecreto" placeholder="Codigo Secreto" required>

<div class="invalid-feedback">

La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.

NO puede tener otros símbolos.

  </div>

</div>

<button  style="    background: rgba(0,136,68,0.6);
    border-radius: .8rem;
    color: #FFF;
    font-size: 1.6rem;
    border: none;
    margin-top: 4%;
    width: 200px;
    margin: 0 auto;
    text-decoration: none;
    font-size: 19px;
    border-radius: 4px;
    transition: .6s;
    margin: 1rem auto;"  type="submit" id="submit" value="AgregarComprador" name="submit"> Continuar</button>


</form>
<a href="compra.php"style="    background: rgba(0,136,68,0.6);
    border-radius: .8rem;
    color: #FFF;
    font-size: 1.6rem;
    border: none;
    margin-top: 4%;
    width: 200px;
    padding: 5px 63px;
    margin: 0 auto;
    text-decoration: none;
    font-size: 19px;
    border-radius: 4px;
    transition: .6s;
    margin: 1rem auto;" >Regresar</a>
</div>
</div>
<div class="container">
    <h1>¡Hola! tu Orden es</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'S/.'.$item["price"]; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo 'S/.'.$item["subtotal"]; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No hay Items en la Lista</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'S/.'.$cart->total(); ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>

    <script>

    (function() {

'use strict';

window.addEventListener('load', function() {

// Fetch all the forms we want to apply custom Bootstrap validation styles to

var forms = document.getElementsByClassName('needs-validation');

// Loop over them and prevent submission

var validation = Array.prototype.filter.call(forms, function(form) {

form.addEventListener('submit', function(event) {

if (form.checkValidity() === false) {

event.preventDefault();

event.stopPropagation();

}

form.classList.add('was-validated');

}, false);

});

}, false);

})();

    </script>
    
    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <script src="admin/vendor/popper.js/umd/popper.min.js"> </script>

    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="admin/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>

    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>

    <script src="admin/vendor/chart.js/Chart.min.js"></script>

    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>

    <script src="admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="admin/js/charts-home.js"></script>

<!-- Main File-->

<script src="admin/js/front.js"></script>
</body>
</html>