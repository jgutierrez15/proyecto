<?php
include "admin/db.php";
$db=con();
error_reporting (0);
session_start();
$varsesion = $_SESSION['user'];
$encabezados=get_sec_encabezados();
$categorias=get_categorias();
$footer=get_footers();

$idpage = mysqli_real_escape_string($db, $_GET['id']);


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

 
<style>
 section{
    width: 80%;
    margin: 10px 100px;
    background:white;
    display: flex;
  }
  .casebody{
    margin: 30px 10px;
  }
</style>
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
<h1>Detalles</h1>
</div>
<?php  
 $query = $db->query("SELECT * FROM products where id='$idpage' ORDER BY id ");
        
            while($row = $query->fetch_assoc()){ ?>
<section>
<div class="caseimg">
<img style="    width: 300px;
    margin: 30px;" src="<?php echo 'admin/'.$row["folder"].$row["src"]; ?>" alt="">
</div>
<div class="casebody">
<p style=" font-size: 35px;
    font-weight: 800;
    font-family: fantasy;
    color: darksalmon;"><?php echo $row["name"]; ?></p>

<p style="FONT-SIZE: 55PX;
    FONT-WEIGHT: 700;"><?php echo 'S/.'.$row["price"]; ?></p>

<h1>DESCRIPCIÓN : </h1>
<p style="    margin: 10px 119px 10px 0px;
    border: 10px solid whitesmoke;
    padding: 10px;" ><?php echo $row["description"]; ?></p>

<a  href="cartAction.php?action=addToCart&id=<?php echo $row["id"]; ?>"><button id="btnAccion">AÑADIR A CARRITO</button></a>
<a style="    float: right;
    margin-top: -67px;
    margin-right: 45px;" href="tienda.php"><button id="btnAccion">SEGUIR COMPRANDO</button></a>
</div>

</section>
<?php } ?>
</div>
</body>
</html>