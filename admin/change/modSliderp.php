<?php 
include "../db.php";
$connect=con();
session_start();

$varsesion = $_SESSION['user'];
if($varsesion == null || $varsesion == ''){
	echo 'Usted no tienen autorización para ingresar al admin';
	die();
}

$query="select u.*,t.nom_tipo_user from users as u inner join tipo_user as t on u.id_tipo_user=t.id_tipo_user where user='$varsesion'";
$result=mysqli_query($connect,$query);

$idpage = mysqli_real_escape_string($connect, $_GET['id_sld_principal']);

$query2="select * from sld_principal where id_sld_principal='$idpage'";

$result1=mysqli_query($connect,$query2);
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Dragon Table tennis</title>
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">

    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="icon" type="image/png" href="../../images/iconobad.ico" />
    <link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="../vendor/font-awesome/css/font-awesome.min.css">
    <!-- Fontastic Custom icon font-->
    <link rel="stylesheet" href="../css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="../css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="../css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="../css/custom.css">
    <!-- Favicon-->
    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
 
 <style>
 .check-ok {
  color: lime;
}
input:valid {
  background-color: #BBFFF0;
}
input:invalid ~ .check-ok {
  display: none;
}
 
input:valid ~ .check-ok {
  display: inline;
}
 </style>
  </head>
  <body>
    <!-- Side Navbar -->
    <?php include("../nav_intro.php") ?>
      <!-- Counts Section -->
      <?php while($row1 = mysqli_fetch_array($result1))

{

   

    ?>
    <div class="encabezado_div">
    <h1>Modificar Slider Principal</h1>
    <form class="needs-validation form_modif" novalidate   enctype="multipart/form-data" method="post" action="action_mSliderp.php">
<input type="hidden" value="<?php echo $row1["id_sld_principal"]?>" name="codigo" >

<div class="form-group">
    <label for="exampleInputEmail1"> Nombre de Slider</label>
      <input type="text"  class="form-control"  value="<?php echo $row1["nom_sld_principal"]?>"    pattern="[a-zA-Z0-9\s]{5,20}" name="nombre" id="nombre" placeholder="Ingresa Nombre" required>
    <div class="invalid-feedback">
        El Nombre de Slider debe tener mas de 5 y menos de 20 caracteres alfanumericos .
      </div>
  </div>

  <div class="form-group">
    <label for="exampleFormControlFile1">Ingresar Foto</label>
      <input type="file" class="form-control-file" name="imagen_nueva" id="exampleFormControlFile1" >
      <input type="hidden" value="<?php echo $row1["src"]?>" name="imagenow">
  </div>


 <button type="submit" class="btn btn-primary">Modificar</button>
 <a href="../noticias.php" class="btn btn-danger">Cancelar</a>

</form>
<?php } ?>


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
    <!-- JavaScript files-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper.js/umd/popper.min.js"> </script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="../vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="../vendor/chart.js/Chart.min.js"></script>
    <script src="../vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="../vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../js/charts-home.js"></script>
    <!-- Main File-->
    <script src="../js/front.js"></script>
    <script type="text/javascript">

CKEDITOR.replace('contenido');

</script>
  </body>
</html>