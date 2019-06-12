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


$query="select u.*,t.nom_tipo_user from users as u inner join tipo_user as t on u.id_tipo_user=t.id_tipo_user where user='$varsesion'";

$result=mysqli_query($connect,$query);



$idpage = mysqli_real_escape_string($connect, $_GET['id']);

$query2="sELECT*FROM orders p inner join users u on p.customer_id=u.codigo_user inner join estado_pedido e on p.id_estado_pedido=e.id_estado where p.id='$idpage' ORDER BY p.id desc";

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

    <!-- Side Navbar -->

    <?php include("../nav_intro.php") ?>

      <!-- Counts Section -->

      <?php while($row1 = mysqli_fetch_array($result1))



{



   



    ?>

    <div class="encabezado_div">

    <h1>Detalles de Pedido  <?php echo $row1["id"]?></h1>

    <form class="needs-validation form_modif" novalidate   enctype="multipart/form-data" method="post" action="action_mProducto.php">

<input type="hidden" value="<?php echo $row1["id"]?>" name="codigo" >

<div class="form-group">

    <label for="exampleInputEmail1">Número de Pedido</label>

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

  <textarea type="text" disabled class="form-control" id="exampleInputEmail1" id="validationCustom01" 
      name="codigo" id="nombre"><?php 
      
   $query = $connect->query("SELECT*FROM order_items as o inner join products as p on o.product_id=p.id  WHERE o.order_id = '$idpage' ORDER BY o.order_id desc");

    while($row = $query->fetch_assoc()){ 
      
      
      echo $row["quantity"]?> <?php echo $row["name"]?> <?php echo $row["price"]* $row["quantity"];
      
      
    } ?></textarea>


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
  


 <a href="../efectivo.php" class="btn btn-danger">REGRESAR</a>



</form>

<?php } ?>





    </div>



      <!-- Header Section-->

    

      <!-- Updates Section -->

    

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