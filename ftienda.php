<?php
include "admin/db.php";
$db=con();
error_reporting (0);
session_start();
$varsesion = $_SESSION['user'];
$encabezados=get_sec_encabezados();
$categorias=get_categorias();


$idpage = mysqli_real_escape_string($db, $_GET['id_categoria']);
$footer=get_footers();
$query="select * from products where id_categoria='$idpage' and stock > 0";

$result=mysqli_query($db,$query);

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
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Dragon Table Tennis</title>
  
</head>
<body>
<?php include('nav.php') ?>
  <div class="span_fondo ftienda">
  <img style="    width: 100%;

height: 100%;
position: absolute;

    z-index: -5;
" src="images/store.jpg" alt="">
<h1 style="">TIENDA DRAGON</h1>
  </div>
<div class="tiendabody">
<div class="txttiendabody">
<h1>Nuestros productos</h1>
</div>

<div class="cajacategorias">
  <h1>Todas las categorias</h1>
  
  <?php foreach($categorias as $img):
      $link = 'ftienda.php?id_categoria='.  $img->id_categoria;
    ?>
  <a href="<?php echo $link; ?>">
    <div class="categoria"> <i class="far fa-arrow-alt-circle-right"></i> <?php echo $img->nombre; ?></div>
  </a>
  <?php endforeach;?>
 
</div>


<?php while($row = mysqli_fetch_array($result))

{

?><div class="cajaproducto">
<div class="titlecaja">
<h1><?php echo $row["name"]; ?></h1>
<p>Precio oferta por unidad</p>

<div style="    font-size: 26px;

   font-weight: 900;" class="precio_eco">S/.<?php echo $row["price"]; ?></div>



<p>Precio normal por unidad</p>

<div style="color:#777;     text-decoration: line-through;  font-size: 20px;" class="precio_eco">S/.<?php echo $row["price_old"]; ?></div>

<p style="    color: #0e3064;"><?php echo $row["stock"]; ?> en stock</p>

<a  href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>"><button id="btnAccion">AÑADIR A CARRITO</button></a>
<a  href="productodetalle.php?id=<?php echo $row["id"]; ?>"><button id="btnAccion">DETALLES</button></a>
</div>

<div class="imgcaja">
<img src="<?php echo 'admin/'.$row["folder"].$row["src"]; ?>" alt="">
</div>
</div>
<?php } ?>

<!---->
</div>
</body>
</html>