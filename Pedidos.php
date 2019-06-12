<?php
include "admin/db.php";
$db=con();
error_reporting (0);
session_start();
$varsesion = $_SESSION['user'];
$encabezados=get_sec_encabezados();
$productos=get_productos();
$footer=get_footers();
$categorias=get_categorias();
include "config.php";

include "carrito.php";
 

$query2="sELECT * FROM pedidos p inner join users u on p.codigo_user=u.codigo_user inner join estado_pedido e on p.id_estado_pedido=e.id_estado WHERE u.user='".$varsesion."' ORDER BY p.id_pedido desc;";

$result2=mysqli_query($db,$query2);

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
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
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
<h1 style="">HOLA  <?PHP echo $varsesion?>! Verifica tus pedidos </h1>
  </div>
<div class="tiendabody">
<div class="txttiendabody">
<h1>MIS PEDIDOS</h1>
</div>
<div class="table-responsive" style="    width: 1200px;
    margin: 0 auto;">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <th>Cod Entrega</th>  
                                    <th>Cliente</th>  
                                    <th>Dni</th>  
                                    <th>Usuario</th>  
                                    <th>estado</th>  
                                    <th></th>  
                               </tr>  
                          </thead>  
                
                                <?php  
                                while($row = mysqli_fetch_array($result2))  
                                {  
                                     echo '  
                                     <tr>
                                     <td>'.$row["codigo_entrega"].'</td>
                                     <td>'.$row["nom_user"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     <td>'.$row["user"].'</td>
                                     <td>'.$row["nombre_estado"].'</td>
                                     <td><a href="detalles/detallespedido.php?id_pedido='.$row["id_pedido"].'"><button type="button" class="btn btn-outline-primary">Detalles</button></a>
        
                                     </td>
                                  
                                     </tr>
                                
                                  
                                     ';  
                                }  
                                ?>  
                     </table>  
                </div>  
  


</div>

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



