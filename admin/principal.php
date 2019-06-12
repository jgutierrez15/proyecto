<?php 

include "db.php";

$connect=con();

session_start();

$varsesion = $_SESSION['user'];

if($varsesion == null || $varsesion == ''){

	echo 'Usted no tienen autorización para ingresar al admin';

	die();

}

$encabezados=get_sec_encabezados();



$query="select u.*,t.nom_tipo_user from users as u inner join tipo_user as t on u.id_tipo_user=t.id_tipo_user where user='$varsesion'";

$result=mysqli_query($connect,$query);



?>

<!DOCTYPE html>

<html>

  <head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <title>	DRAGON TABLE TENNIS</title>

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

    

    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">



    <!-- Fontastic Custom icon font-->



    <link rel="stylesheet" href="css/fontastic.css">

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

      <section class="dashboard-counts section-padding">

        <div class="container-fluid">

          <div class="row">

            <!-- Count item widget-->

            <div class="col-xl-2 col-md-4 col-6">

              <div class="wrapper count-title d-flex">

                <div class="icon"><i class="icon-user"></i></div>

                <div class="name"><strong class="text-uppercase">New Clients</strong><span>Last 7 days</span>

                  <div class="count-number">25</div>

                </div>

              </div>

            </div>

            <!-- Count item widget-->

            <div class="col-xl-2 col-md-4 col-6">

              <div class="wrapper count-title d-flex">

                <div class="icon"><i class="icon-padnote"></i></div>

                <div class="name"><strong class="text-uppercase">Work Orders</strong><span>Last 5 days</span>

                  <div class="count-number">400</div>

                </div>

              </div>

            </div>

            <!-- Count item widget-->

            <div class="col-xl-2 col-md-4 col-6">

              <div class="wrapper count-title d-flex">

                <div class="icon"><i class="icon-check"></i></div>

                <div class="name"><strong class="text-uppercase">New Quotes</strong><span>Last 2 months</span>

                  <div class="count-number">342</div>

                </div>

              </div>

            </div>

            <!-- Count item widget-->

            <div class="col-xl-2 col-md-4 col-6">

              <div class="wrapper count-title d-flex">

                <div class="icon"><i class="icon-bill"></i></div>

                <div class="name"><strong class="text-uppercase">New Invoices</strong><span>Last 2 days</span>

                  <div class="count-number">123</div>

                </div>

              </div>

            </div>

            <!-- Count item widget-->

            <div class="col-xl-2 col-md-4 col-6">

              <div class="wrapper count-title d-flex">

                <div class="icon"><i class="icon-list"></i></div>

                <div class="name"><strong class="text-uppercase">Open Cases</strong><span>Last 3 months</span>

                  <div class="count-number">92</div>

                </div>

              </div>

            </div>

            <!-- Count item widget-->

            <div class="col-xl-2 col-md-4 col-6">

              <div class="wrapper count-title d-flex">

                <div class="icon"><i class="icon-list-1"></i></div>

                <div class="name"><strong class="text-uppercase">New Cases</strong><span>Last 7 days</span>

                  <div class="count-number">70</div>

                </div>

              </div>

            </div>

          </div>

        </div>

      </section>

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