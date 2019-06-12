<?php

include ("admin/action_logcliente.php");

?>

<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/style.css">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">



  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>

  <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">

    <!-- Font Awesome CSS-->

    <link rel="stylesheet" href="admin/vendor/font-awesome/css/font-awesome.min.css">

    <!-- Fontastic Custom icon font-->

    <link rel="stylesheet" href="admin/css/fontastic.css">

    <!-- Google fonts - Roboto -->

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700">

    <!-- jQuery Circle-->

    <link rel="stylesheet" href="admin/css/grasp_mobile_progress_circle-1.0.0.min.css">

    <!-- Custom Scrollbar-->

    <link rel="stylesheet" href="admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">

    <!-- theme stylesheet-->

    <link rel="stylesheet" href="admin/css/style.default.css" id="theme-stylesheet">

    <!-- Custom stylesheet - for your changes-->

    <link rel="stylesheet" href="admin/css/custom.css">

    <link rel="stylesheet" href="css/superslides.css">

    <link rel="icon" type="image/png" href="images/iconobad.ico" />

    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <title>Dragon Table Tennis</title>

  <script>
function comprobarUsuario() {
  
  $("#loaderIcon").show();
  jQuery.ajax({
  url: "admin/new/validar_usuario.php",
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

 

  



   </header>

   <div class="cont">

  <div class="form sign-in">

      <form action="" class="form_logeo_clie" method="post">

    <h2>Bienvenido!!!</h2>

    <label>

      <span>Usuario</span>

      <input type="text" name="user" />

    </label>

    <label>

      <span>Contraseña</span>

      <input type="password" name="pass" />

    </label>

	<span class="alert_spanex"><?php echo $error; ?></span>

    <button type="submit"  style="margin: auto !important;" name="submit" class="submit">Ingresar</button>

</form>

  </div>

  <div class="sub-cont">

    <div class="img">

      <div class="img__text m--up">

        <h2>Nuevo Aquí?</h2>

        <p>Registrate, no pierdas la oportunida de vivir una experiencia diferente con tu deporte favorito!</p>

      </div>

      <div class="img__text m--in">

        <h2>Ya estás inscrito?</h2>

        <p>Tenemos novedades para tí!</p>

      </div>

      <div class="img__btn">

        <span class="m--up">registrar</span>

        <span class="m--in">ingresar</span>

      </div>

    </div>

    <div class="form sign-up" style="    overflow: auto;">

      <h2>Tiempo de disfrutar</h2>

      <form class="needs-validation form_modif form_modif_clie  " novalidate   enctype="multipart/form-data" method="post" action="admin/new/action_addclie.php">



      <label>

        <span>Usuario</span>

        <input type="text"  class="form-control"    pattern="[a-zA-Z1-9]{5,20}" name="user" id="user" placeholder="Ingresa Usuario"  onBlur="comprobarUsuario()" required>

<span style="display:none" id="estadousuario"></span> 
 <p><img src="images/LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>

    <div class="invalid-feedback">

    El usuario debe tener mas de 5 y menos de 20 caracteres alfanumericos y no debe contener espacios.

      </div>

    </label>

      

      <label>

        <span>Contraseña</span>

        <input type="password"  class="form-control" id="exampleInputEmail1" id="validationCustom01" pattern="^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$" name="pass" id="pass" placeholder="Ingresa Contraseña" required>

    <div class="invalid-feedback">

    La contraseña debe tener al entre 8 y 16 caracteres, al menos un dígito, al menos una minúscula y al menos una mayúscula.

NO puede tener otros símbolos.

      </div>

      </label>

      <label>

        <span>Nombre Completo</span>

        <input type="text"  class="form-control" id="exampleInputEmail1" id="validationCustom01" pattern="[a-zA-Z\s]{5,50}" name="nombre" id="nombre" placeholder="Ingresa Nombre" required> 

    <div class="invalid-feedback">

        El Nombre debe tener mas de 5 letras.

      </div>

      </label>
      <label>

<span>Dni</span>

<input type="text"  class="form-control" id="exampleInputEmail1" id="validationCustom01" pattern="^[0-9]{8}" name="dni" id="dni" placeholder="Ingresa dni" required> 

<div class="invalid-feedback">

El Dni debe tener 8 números

</div>

</label>
<label>

<span>Celular</span>

<input type="text"  class="form-control" id="exampleInputEmail1" id="validationCustom01"  pattern="^[0-9]{9}" name="celular" id="celular" placeholder="Ingresa celular" required> 

<div class="invalid-feedback">

El Celular debe tener 9 números

</div>

</label>
      <label>

        <span>Foto</span>

<input type="file" class="form-control-file" id="imagedoc" name="imagen"  accept="image/*" >  

      </label>

      <button type="submit" style="margin: auto !important;" id="btnRegistrar"  name="submit" class="submit" disabled>Registrarme</button>

     

    </div>

</form>

  </div>

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
  $("#estadousuario").hide();
}

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

<script  src="js/index.js"></script>

<!----ZONA DE JS ------------------------------------------------->

<script src="js/jquery.superslides.min.js"></script>

</body>

</html>