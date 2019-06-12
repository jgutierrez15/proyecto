<?php
include "admin/db.php";
$db=con();
error_reporting (0);
session_start();
$varsesion = $_SESSION['user'];
$encabezados=get_sec_encabezados();
$footer=get_footers();


$idpage = mysqli_real_escape_string($db, $_GET['id']);

$query2="sELECT*FROM orders p inner join users u on p.customer_id=u.codigo_user inner join estado_pedido e on p.id_estado_pedido=e.id_estado where p.id='$idpage' ORDER BY p.id desc";




$result1=mysqli_query($db,$query2);

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
    <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">

<!-- Font Awesome CSS-->

<link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Dragon Table Tennis</title>
  
</head>
<style>
footer {
    width: 100%;
    height: 250px;
    background-color: rgba(0,136,68,0.6);
    position: relative;
    border-top: 2px solid white;
    display: flex;
    padding: 35px 250px;
}
</style>
<body>
<?php include('nav.php') ?>
 
<div class="span_fondo ftienda">
  <img style="    width: 100%;

height: 100%;
position: absolute;

    z-index: -5;
" src="images/store.jpg" alt="">
<h1 style="">HOLA  <?PHP echo $varsesion?>! Verifica tu pedidos </h1>
  </div>
 <!-- Counts Section -->

 <?php while($row1 = mysqli_fetch_array($result1))



{



   



    ?>

    <div class="encabezado_div" style="    text-align: center;">

    <h1>Detalles de Pedido  <?php echo $row1["id"]?></h1>

    <form class="needs-validation form_modif" novalidate style="    width: 400px;
    margin: 0 auto;    text-align: center;"   enctype="multipart/form-data" method="post" action="action_mProducto.php">

<input type="hidden" value="<?php echo $row1["id"]?>" name="codigo" >

<div class="form-group">

    <label for="exampleInputEmail1">Codigo de Entrega</label>

      <input type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
         value="<?php echo $row1["id"]?>" name="codigo" id="nombre">



  </div>

  
<div class="form-group">

<label for="exampleInputEmail1">Codigo Secreto</label>

  <input type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
     value="<?php echo $row1["cod_secreto"]?>" name="codigo" id="nombre">



</div>
<div class="form-group">
<label for="exampleInputEmail1">Cliente</label>
  <input type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
     value="<?php echo $row1["nom_user"]?>" name="codigo" id="nombre">
</div>
<div class="form-group">
   
<label for="exampleInputEmail1">Estado</label>
<?php if($row1["id_estado_pedido"]==2): ?>
  <input style="background:red; color:white;" type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
     value="<?php echo $row1["nombre_estado"]?>" name="codigo" id="nombre">
     <?php else: ?>
     <input style="background:green; color:white;" type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
     value="<?php echo $row1["nombre_estado"]?>" name="codigo" id="nombre">
<?php endif; ?>
</div>

<div class="form-group">

<label for="exampleInputEmail1">DETALLES DEL PEDIDO</label>

  <textarea style="text-align:center;     height: 133px;" type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
      name="codigo" id="nombre"><?php
        
   $query = $db->query("SELECT*FROM order_items as o inner join products as p on o.product_id=p.id  WHERE o.order_id = '$idpage' ORDER BY o.order_id desc");

    while($row = $query->fetch_assoc()){ 
      
      
      echo $row["quantity"]?> <?php echo $row["name"]?>  = S/.<?php echo $row["price"]* $row["quantity"];?> -
      
      
   <?php } ?></textarea>



</div>
  <div class="form-group">

<label for="exampleInputEmail1">Email</label>

  <input type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
     value="<?php echo $row1["email"]?>" name="codigo" id="nombre">

</div>


<div class="form-group">

    <label for="exampleInputEmail1">Celular</label>

      <input type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
         value="<?php echo $row1["celular"]?>" name="codigo" id="nombre">



  </div>
  
<div class="form-group">

<label for="exampleInputEmail1">Dni </label>

  <input type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
     value="<?php echo $row1["dni"]?>" name="codigo" id="nombre">



</div>

<div class="form-group">

    <label for="exampleInputEmail1">Usuario del Cliente</label>

      <input type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
         value="<?php echo $row1["nom_user"]?>" name="codigo" id="nombre">



  </div>
  


 <a href="miperfil.php" class="btn btn-danger">REGRESAR</a>



</form>

<?php } ?>





    </div>



      <!-- Header Section-->





<footer>
<?php foreach($footer as $img):?>
<li>
  <p>Dirección : <br> <?php echo $img->direccion_footer; ?>  </p>
  <p>Celular : <br> <?php echo $img->cel_footer; ?> </p>
  <p>Telefono : <br> <?php echo $img->tel_footer; ?> </p>
  <p>Horario : <br> <?php echo $img->horarios_footer; ?> </p>
</li>
<li>
<p>Facebook : <br> <?php echo $img->facebook_footer; ?> </p>
<p>email : <br><?php echo $img->email_footer; ?> </p>
</li>

<?php endforeach;?>

</footer>

<script>
$(document).ready(function(){
 $('#employee_data').DataTable();
});

</script>

</body>
</html>












