<?php 

include "../db.php";

$connect=con();

session_start();



$varsesion = $_SESSION['user'];

if($varsesion == null || $varsesion == ''){

	echo 'Usted no tienen autorización para ingresar al admin';

	die();

}
$categorias=get_categorias();


$query="select * from users as u inner join tipo_user as t on u.id_tipo_user=t.id_tipo_user  where user='$varsesion'";

$result=mysqli_query($connect,$query);



$idpage = mysqli_real_escape_string($connect, $_GET['id']);



$query2="select * from products  as p  inner join categoria as cat on cat.id_categoria=p.id_categoria where p.id='$idpage'";



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

 
<script>
function comprobartext() {


  jQuery.ajax({
  url: "validar_noticia.php",
  data:'contenido_noticia='+$("#contenido").val(),
  type: "POST",
  success:function(data){
    
     if(data == "<span style='color:green;'  class='estado-disponible-usuario'> Campo Vacío.</span>") {
            
                    $("#estadousuario").html(data);
                    
                           $("#estadousuario").show();
                           
                            $('#btnRegistrar').attr('disabled', true);
                   
                        } if(data == "<style>.stado{display:none;}</style>") {
                         
                              $("#estadousuario").hide();
                               $('#btnRegistrar').attr('disabled', false);
                                  
                                  }
                        

                     
  
  },
  error:function (){}
  });
}

</script>

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

    <h1>Modificar Productos</h1>

    <form class="needs-validation form_modif" novalidate   enctype="multipart/form-data" method="post" action="action_mProducto.php">

<input type="hidden" value="<?php echo $row1["id"]?>" name="codigo" >

<div class="form-group">

    <label for="exampleInputEmail1"> Nombre De Producto</label>

      <input type="text"  class="form-control" id="exampleInputEmail1" id="validationCustom01" 
       pattern="^[a-zA-Z[0-9]ñÑáéíóúÁÉÍÓÚ\s]{5,30}"  value="<?php echo $row1["name"]?>" name="nombre" id="nombre" placeholder="Ingresa Nombre de noticia" required>

      <span style="color: red; " id="comprobarusuario"></span>

    <div class="invalid-feedback">

        La noticia debe tener mas de 5 y menos de 30 caracteres alfanumericos.

      </div>

  </div>

  <div class="form-group">

<label for="exampleInputEmail1"> Precio</label>

  <input type="text"  class="form-control" id="exampleInputEmail1" id="validationCustom01" 
   pattern="^[0-9]+([.][0-9]{2})?$" name="precio" id="precio"  value="<?php echo $row1["price"]?>" placeholder="Ingresa Precio" required>

  <span style="color: red; " id="comprobarusuario"></span>

<div class="invalid-feedback">
Solo permiten números enteros o montos con 2 decimales.

  </div>

</div>

<div class="form-group">

<label for="exampleInputEmail1"> Precio Descuento</label>

  <input type="text"  class="form-control" id="exampleInputEmail1" id="validationCustom01" 
   pattern="^[0-9]+([.][0-9]*)?$" name="descuento" id="descuento"  value="<?php echo $row1["price_old"]?>" placeholder="Ingresa precio con descuento" required>

  <span style="color: red; " id="comprobarusuario"></span>

<div class="invalid-feedback">
Solo permiten números enteros o montos con 2 decimales .

  </div>

</div>
  <div class="form-group">

    <label for="exampleInputEmail1">Descripción Producto</label>

    <textarea style="    width: 100%;
    height: 300px;" name="descripcion" max-length="20" onkeyup="countChars(this);"><?php echo $row1["description"]?></textarea>

  
<p id="charNum">0 caracteres</p>
 
  </div> 
  
<div class="form-group">

<label for="exampleInputEmail1"> stock</label>

  <input type="text"  class="form-control" id="exampleInputEmail1" id="validationCustom01" 
   pattern="^[0-9]+" name="stock" id="stock"  value="<?php echo $row1["stock"]?>" placeholder="Ingresa Stock" required>

  <span style="color: red; " id="comprobarusuario"></span>

<div class="invalid-feedback">
Solo Número entero

  </div>

</div>

<div class="form-group">

<label for="exampleInputEmail1"> Categoria</label>


<select name="categoria" id="categoria">

<option value="<?php echo $row1["id_categoria"]?>"> <?php echo  $row1["nombre"] ?></option>
<?php foreach($categorias as $img):?>


<option value="<?php echo $img->id_categoria; ?>"><?php echo $img->nombre; ?></option>

<?php endforeach;?>

</select>


</div>


<div class="form-group">

  <label for="exampleFormControlFile1">Ingresar Foto</label>


<input type="file" class="form-control-file" id="imagedoc" name="imagen_nueva"  accept="image/*" >  
    <input type="hidden" value="<?php echo $row1["src"]?>" name="imagenow">

    <span style="display:none" id="estadousuario"></span> 

</div>







 <button   type="submit" id="btnModificar"  class="btn btn-primary">Modificar</button>

 <a href="../productos.php" class="btn btn-danger">Cancelar</a>



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

  
  
    <!-- JavaScript files-->
    <script>

function countChars(obj){
    var maxLength = 500;
    var strLength = obj.value.length;
    
    if(strLength > maxLength){
       
        document.getElementById("charNum").innerHTML = '<span style="color: red;">Superaste el limite de  caracteres</span>';
        $('#btnModificar').attr('disabled', true);
    }
 
   else if(strLength == 0)
    {
      document.getElementById("charNum").innerHTML = '<span style="color: red;">Debes tener mas de un caracter</span>';
      $('#btnModificar').attr('disabled', true);
    }
    else{
        document.getElementById("charNum").innerHTML = strLength+' out of '+maxLength+' characters';
        $('#btnModificar').attr('disabled', false);
    }
}
</script>
  </body>

</html>