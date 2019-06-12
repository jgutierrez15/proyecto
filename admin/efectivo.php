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

$query2="sELECT * FROM orders p inner join users u on p.customer_id=u.codigo_user inner join estado_pedido e on p.id_estado_pedido=e.id_estado WHERE p.id_forma_pago=1 ORDER BY p.id_estado_pedido desc;";

$result2=mysqli_query($connect,$query2);

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

    <!-- Custom stylesheet - for your changes-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  

    <!-- Tweaks for older IEs--><!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

  </head>

  <body>

    <!-- Side Navbar -->

   <?php include("nav_admin.php") ?>

       <div class="table-responsive" style="    width: 900px;
    margin: 0 auto;">  
                     <table id="employee_data" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                               <th>Cod Entrega</th>  
                                    <th>Cod Entrega</th>  
                                    <th>Cliente</th>  
                                    <th>Dni</th>  
                                    <th>Usuario</th>  
                                    <th>Estado</th>  
                                    <th>Fecha</th>  
                                    <th></th>  
                               </tr>  
                          </thead>  
                
                                <?php  
                                while($row = mysqli_fetch_array($result2))  
                                {  
                                     echo '  
                                     <tr>
                                     <td>'.$row["id"].'</td>
                                     <td>'.$row["cod_secreto"].'</td>
                                     <td>'.$row["nom_user"].'</td>
                                     <td>'.$row["dni"].'</td>
                                     <td>'.$row["user"].'</td>
                                     <td>'.$row["nombre_estado"].'</td>
                                     <td>'.$row["created"].'</td>
                                     <td><a href="detalles/detallespedido.php?id='.$row["id"].'"><button type="button" class="btn btn-outline-primary">Detalles</button></a>
                                     <a href="estado/efectivo.php?id='.$row["id"].'"><button type="button" class="btn btn-outline-primary">Cambiar Estado</button></a>
                                     </td>
                                  
                                     </tr>
                                
                                  
                                     ';  
                                }  
                                ?>  
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

<script>
$(document).ready(function(){
 $('#employee_data').DataTable();
});

</script>



    <script src="vendor/popper.js/umd/popper.min.js"> </script>

    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>

    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>

    <script src="vendor/chart.js/Chart.min.js"></script>

    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>

    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>

    <script src="js/charts-home.js"></script>


	<script>		
		$(document).on("ready", function(){
			
		});

		
		

	</script>
    <!-- Main File-->



  </body>

</html>