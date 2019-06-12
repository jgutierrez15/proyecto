<?php 

include "db.php";

$connect=con();

session_start();

$productos=get_productos();

$varsesion = $_SESSION['user'];

if($varsesion == null || $varsesion == ''){

	echo 'Usted no tienen autorización para ingresar al admin ';

	die();

}



$query="select u.*,t.nom_tipo_user from users as u inner join tipo_user as t on u.id_tipo_user=t.id_tipo_user where user='$varsesion'";

$result=mysqli_query($connect,$query);



?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <title>Dragon Table Tennis</title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="robots" content="all,follow">

    <!-- Bootstrap CSS-->

    <link rel="icon" type="image/png" href="../images/iconobad.ico" />

    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS-->

    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">

    <!-- Fontastic Custom icon font-->

    <link rel="stylesheet" href="css/fontastic.css">

    <!-- Google fonts - Roboto -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <!-- jQuery Circle-->

    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">

    <!-- Custom Scrollbar-->

    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">

    <!-- theme stylesheet-->

    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes-->

    <link rel="stylesheet" href="css/custom.css">

    <!-- Favicon-->



    <!-- Tweaks for older IEs--><!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  </head>

  <body>

    <!-- Side Navbar -->

   <?php include("nav_admin.php") ?>



      <!-- Counts Section -->

    <div class="encabezado_div">

    <h1>Control de Productos</h1>

   <a href="./new/producto.php"> <button type="button" class="btn btn-outline-info">Nuevo Producto</button></a>



<table class="table table-bordered table-dark">

  <thead>

    <tr>

      <th scope="col">Nombre Producto</th>
      <th scope="col">Stock</th>
    

      <th scope="col">Imagen de Producto</th>

      <th scope="col">Fecha Registro</th>

      <th scope="col-md-6"></th>

    </tr>

  </thead>

  <tbody>

  <?php foreach($productos as $img):?>

    <tr>

    <td ><?php echo $img->name; ?></td>

    <td ><?php echo $img->stock; ?></td>

      <td><img src="<?php echo $img->folder.$img->src ?>" alt="person" style="width:150px;" ></td>

      <td ><?php echo $img->created; ?></td>

      <td><a href="change/modProductos.php?id=<?php echo $img->id; ?>">

      <button type="button" class="btn btn-outline-primary">Modificar</button></a> 

      <a  href="eliminar/action_drop_producto.php?id=<?php echo $img->id; ?>"><button type="button" class="btn btn-outline-danger">Eliminar</button></a></td>



    </tr>

    <?php endforeach;?>

   

  </tbody>

</table>



    </div>



      <!-- Header Section-->

    

      <!-- Updates Section -->

    

      <footer class="main-footer">

        <div class="container-fluid">

          <div class="row">

            <div class="col-sm-6">

              <p>Computación y Informatica</p>

            </div>

            <div class="col-sm-6 text-right">

              <p>Diseñado por Alumnos de Cibertec</a></p>

              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->

            </div>

          </div>

        </div>

      </footer>

    </div>

    <!-- JavaScript files-->

    <script src="vendor/jquery/jquery.min.js"></script>

    <script src="vendor/popper.js/umd/popper.min.js"> </script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>

    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>

    <script src="vendor/chart.js/Chart.min.js"></script>

    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>

    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="js/charts-home.js"></script>

    <!-- Main File-->

    <script src="js/front.js"></script>

  </body>

</html>