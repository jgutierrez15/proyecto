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

$idpage = mysqli_real_escape_string($connect, $_GET['id_categoria']);

$query2="select * from categoria where id_categoria='$idpage'";

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



    <!-- Tweaks for older IEs--><!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

 
<script>
function comprobarUsuario() {

  $("#loaderIcon").show();
  jQuery.ajax({
  url: "validar_usuario.php",
  data:'user='+$("#user").val(),
  type: "POST",
  success:function(data){
    
     if(data == "<span style='color:red;' class='estado-no-disponible-usuario'> Usuario no Disponible.</span>") {
              $("#comprobarusuario").show();
                    $("#estadousuario").html(data);
                     $("#loaderIcon").hide();
                           $("#estadousuario").show();
                           
                            $('#btnRegistrar').attr('disabled', true);
                   
                        } if(data == "<span style='color:green;'  class='estado-disponible-usuario'> Usuario Disponible.</span>") {
                             $("#estadousuario").html(data);
                     
                              $("#loaderIcon").hide();
                               $("#estadousuario").show();
                               $('#btnRegistrar').attr('disabled', false);
                                  
                                  }
                          if(data == "vacio"){
                               $("#loaderIcon").hide();
                           $("#estadousuario").hide();
                           $('#btnRegistrar').attr('disabled', true);
                           
                        }
                        

                     
  
  },
  error:function (){}
  });
}

</script>

  </head>

  <body>

  <?php include("../nav_intro.php") ?>


   <?php while($row2 = mysqli_fetch_array($result1))

{

   

    ?>
    <div class="encabezado_div">

    <h1>Modificar Categoria</h1>


<form class="needs-validation form_modif" novalidate  method="post" action="action_mCategoria.php">
<input type="hidden" class="form-control " id="exampleInputEmail1" value="<?php echo $row2["id_categoria"]?>"  name="codigo" placeholder="Codigo">
  <div class="form-group">
    <label for="exampleInputEmail1">Nombre de Categoria</label>
    <input type="text"  class="form-control" id="exampleInputEmail1" id="validationCustom01" value="<?php echo $row2["nombre"]?>"  pattern="[a-zA-Z0-9]{5,20}" name="nombre"  required> 
    <div class="invalid-feedback">
La Categoria debe tener mas de 5 y menos de 20 caracteres alfanumericos y no debe contener espacios.
</div>

  </div>

 <button type="submit" class="btn btn-primary">Modificar</button>
 <a href="../encabezado.php" class="btn btn-danger">Cancelar</a>

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
form.classList.add('was-validated');
}

$("#estadousuario").hide();
form.classList.add('was-validated');
 
}, false);

});

}, false);

})();

    </script>

  
<script type="text/javascript">
function LimitAttach(tField,iType) {
  file=tField.value;
  if (iType==1) {
  extArray = new Array(".jpeg",".jpe",".gif",".jpg",".png");
  } 
  allowSubmit = false;
  if (!file) return false;
  while (file.indexOf("\\") != -1) file = file.slice(file.indexOf("\\") + 1);
  ext = file.slice(file.indexOf(".")).toLowerCase();
  for (var i = 0; i < extArray.length; i++) {
    if (extArray[i] == ext) {
      allowSubmit = true;
      break;
  }
  }
  if (allowSubmit) {
  return true
  } else {
  tField.value="";
  alert("Usted sólo puede subir archivos con extensiones " + (extArray.join(" ")) + "\n Reiniciando Formulario");
return false;
  setTimeout("location.reload()",2000);
  }
  } 
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

  </body>

</html>