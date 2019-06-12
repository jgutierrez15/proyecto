<?php
include "admin/db.php";
$db=con();
error_reporting (0);
session_start();

$varsesion = $_SESSION['user'];


$encabezados=get_sec_encabezados();

 

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
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Dragon Table Tennis</title>
    <script>
    function updateCartItem(obj,id){
        $.get("cartAction.php", {action:"updateCartItem", id:id, qty:obj.value}, function(data){
           
                location.reload();
          
        });
    }
    </script>
  
</head>
<body>
<?php include('nav.php') ?>
  <div class="span_fondo ftienda">
  <img style="    width: 100%;

height: 100%;
position: absolute;

    z-index: -5;
" src="images/store.jpg" alt="">
<h1 style="">Productos en carrito</h1>
  </div>
  
    <div class="procesos">
<div class="disablecarrito activeproceso">
    <h1><i class="fas fa-list-alt"></i> Productos </h1> 
</div>
<div class="disablecarrito">
    <h1><i class="fas fa-address-card"></i> Datos </h1> 
</div>
<div class="disablecarrito">
    <h1><i class="fas fa-pager"></i> Pagar</h1>
</div>
</div>
<h3 class="titulo-pasos-proceso">TUS PRODUCTOS ESTÁN EN EL CARRO</h3>
<hr>
<div class="resumenpago">
      <div class="txtresumen">
          <h1>Resumen de Pago :</h1>
      </div>
      <h2 style="     
    text-align: left;
    padding-bottom: 20px;
    width: 213px;
    font-size: 28px !important;
    margin-left: 10px;
    border-bottom: black solid 1px;
">

<?php  if($cart->total_items() == 0): ?>
<p class="totalnull"  style="display:none;" >Total : S/. <?php echo $cart->total(); ?></p> 
<?php else: ?>
<p class="totalnull" >Total : S/.<?php echo $cart->total(); ?></p> 
</h2>
<?php 
if($varsesion != null || $varsesion != ''):
 ?>
<a href="datos.php"><button style="    background: rgba(0,136,68,0.6);
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
    margin: 1rem auto;">Continuar Compra</button></a>
      </div>


      <?php
      else:
        ?>
<a href="logusuario.php"><button style="    background: rgba(0,136,68,0.6);
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
    margin: 1rem auto;">Logeate para comprar</button></a>

        <?php
   endif; ?>
<?php endif; ?>
<?php





        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>

<div class="compralistado">
<div class="listproduct">
    <div class="cajanombre">
        
    <a href="cartAction.php?action=removeCartItem&id=<?php echo $item["rowid"]; ?>"  onclick="return confirm('Estás seguro de eliminar el producto de tu carrito?')">   <button class="boton-eliminar-producto-carro ">x</button> </a>

        <img src="<?php echo 'admin/uploads/'.$item["src"];?>" > <br>

  <p style="    margin-left: 48px;
    font-size: 20px;"> <?php echo $item["nom_producto"]; ?></p> 
    </div>
    <div class="cajaprecio">
        <span>Precio </span> <br>
   <p style="font-size: 24px;     position: absolute;">S/. <?php echo $item["price"]; ?></p>
    </div>

    <div class="unidades">
        <span style="margin-left: 7px;">Unidades </span><br>
        <select class="form-control text-center"  onchange="updateCartItem(this, '<?php echo $item["rowid"]; ?>')">
<?php if ($item["qty"] == 2 ) :?>
<option  value="1">1</option>

<option selected value="2">2</option>

<option  value="3">3</option>
<?php elseif($item["qty"] == 1):?>
    <option selected value="1">1</option>

<option  value="2">2</option>

<option   value="3">3</option>

<?php elseif($item["qty"] == 3):?>
    <option  value="1">1</option>

<option  value="2">2</option>

<option selected  value="3">3</option>

<?php endif; ?>
</select>

    </div>

    <div class="subtotal">
        <span>Sub Total </span> <br>
  <p style="font-size: 24px;
    margin-top: 11px;
    margin-left: -24px;"><?php echo 'S/.'.$item["subtotal"]; ?></p> 
    </div>
</div>
  </div>

 

  

<?php
}}else{?>


<div style="      font-size: 17px;  
    margin: 0 auto;" class="alert alert-success">

No hay productos en el carrito

</div>
<a href="tienda.php"><button style="    background: rgba(0,136,68,0.6);
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
    margin: 1rem auto;">Ir a comprar</button></a>
<?php }?>


</body>
</html>
