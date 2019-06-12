<?php
include "admin/db.php";
$db=con();
include "config.php";
include "action_datos.php";

$varsesion = $_SESSION['user'];
$encabezados=get_sec_encabezados();
$pedidos=get_pedidos();
error_reporting (0);
$Regisnombre=$_SESSION['nombre'];
$Regiscelular=$_SESSION['celular'];
$Regiscorreo=$_SESSION['correo'];
$Regisdni=$_SESSION['dni'];
$Regisid=$_SESSION['id'];

$Regiscodigoseguridad=$_SESSION['codigosecreto'];
$cnt=1;

  foreach($pedidos as $img):
$cnt=count($pedidos);
     endforeach;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tienda Dragon Table Tennis</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://checkout.culqi.com/js/v3"></script>
    <link rel="stylesheet" href="css/superslides.css">
     <link rel="icon" type="image/png" href="images/iconobad.ico" />
     <link rel="stylesheet" href="./bootstrap/css/bootstrap.min.css">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
     <link rel="stylesheet" href="admin/vendor/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">

<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Dragon Table Tennis</title>
  
</head>
<body>
    
<div id='loadpage' style="display:none;">
<div class="lds-css ng-scope"><div style="width:100%;height:100%" class="lds-dual-ring"><div></div>
</div>
<p>La venta se está procesando espere unos segundos</p>

<style type="text/css">
#loadpage{
    position: absolute;
    width: 100%;
    z-index: 11111;
    padding: 140px 40%;
    overflow: hidden;
    background-color: rgba(69, 61, 60, 0.9);
    height: 100%;
    margin: 0 auto;
    color:white;
}
@keyframes lds-dual-ring {
  0% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@-webkit-keyframes lds-dual-ring {
  0% {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
.lds-dual-ring {
  position: relative;
}
.lds-dual-ring div {
  position: absolute;
  width: 160px;
  height: 160px;
  top: 20px;
    left: 35px;
  border-radius: 50%;
  border: 8px solid #000;
  border-color: #e8ad11 transparent #e8ad11 transparent;
  -webkit-animation: lds-dual-ring 1s linear infinite;
  animation: lds-dual-ring 1s linear infinite;
}
.lds-dual-ring {
  width: 250px !important;
  height: 200px !important;
  -webkit-transform: translate(-100px, -100px) scale(1) translate(100px, 100px);
  transform: translate(-100px, -100px) scale(1) translate(100px, 100px);
}
</style>
</div>

</div>

<?php include('nav.php') ?>
<?php if($cart->total_items() <= 0){
    header("Location: index.php");
}
 ?>
  <div class="span_fondo ftienda">
  <img style="    width: 100%;

height: 100%;
position: absolute;

    z-index: -5;
" src="images/store.jpg" alt="">
<h1 style="">Productos en carrito</h1>
  </div>
  
    <div class="procesos">
<div class="disablecarrito ">
    <h1><i class="fas fa-list-alt"></i> Productos </h1> 
</div>
<div class="disablecarrito ">
    <h1><i class="fas fa-address-card"></i> Datos </h1> 
</div>
<div class="disablecarrito activeproceso">
    <h1><i class="fas fa-pager"></i> Pagar</h1>
</div>
</div>

<h3 class="titulo-pasos-proceso">Escoge tu Metodo de Pago Favorito <?php echo $Regisnombre; ?> !!</h3>
<hr>

<div class="tipopago">
  
	<article class="card-group-item">
	
		<div class="filter-content">
			<div class="card-body">
			<label class="form-check">
			 
			  <span class="form-check-label">
			    Tarjeta
              </span>
              <input class="form-check-input" type="radio"  onchange="javascript:showContent()" name="documento" id="checktarjeta" value="tarjeta">
			</label>
			<label class="form-check">
			 
			  <span class="form-check-label">
			Efectivo
              </span>
              <input class="form-check-input" checked type="radio" onchange="javascript:showContent()" name="documento" id="checkefectivo" value="efectivo">
			</label>
			<label class="form-check">
			 
			  <span class="form-check-label">
			    Transferencia
              </span>
              <input class="form-check-input"  type="radio" onchange="javascript:showContent()" name="documento" id="checktransferencia" value="transferencia">
			</label>
			</div>
		</div>
	</article> 

</div>

<div id="content" style="display:none;"  class="contenidopago">
<h1>Pasarela de Pagos Culqi :</h1>
<hr>
<p>Ingresa los datos de tu tarjeta, al terminar el proceso te llegará el codigo de tu pedido a tu correo electronico, con el cual podrás 
    acercarte a academia y pedir tus productos comprados
</p>
<?php if(!empty($_SESSION['CARRITO'])){?>
   
    <?php  $total=0;?>
   <?php foreach($_SESSION['CARRITO'] as $indice=>$producto){?>

 <?php $total=$total+($producto['precio']*$producto['cantidad']); ?>
   <?php }?>
 
 
    <?php }else{?>
    <?php }?>
    <?php
    $cont=0;

   
?>


<img  style="    width: 96px;
    margin: 2px 110px;" src="images/culqi.jpg" alt="">
<form action=""  name="formu"  onsubmit="return culqi()">

<input type="hidden" value="<?php echo $Regisid; ?>" id="id" name="id"  > 
<input type="hidden" value="<?php echo 'P000'.$cnt; ?>" id="codentrega" name="codentrega"  >
<input type="hidden" value="<?php echo $Regisnombre; ?>" id="nombre" name="nombre"  > 
<input type="hidden" value="cocal cola" id="descripcion" name="descripcion"  >

<input type="hidden"  value="<?php echo $Regiscelular; ?>" id="celular" name="celular"  >
<input type="hidden" value="<?php echo $totalprice; ?>" id="precio" name="precio"  > 
<input type="hidden" value="<?php echo $Regiscorreo; ?>"  id="correo" name="correo" >
<input type="hidden" value="<?php echo $Regisdni; ?>" id="dni" name="dni">
<input type="hidden" value="<?php echo $Regiscodigoseguridad; ?>" id="codsecreto" name="codsecreto">
<input type="hidden" value="3" id="estado" name="estado">
<input type="hidden" value="2" id="pago" name="pago">




<input class="btn btn-primary btn-lg" disabled type="button" id="buyButton" value="PAGAR CON TARJETA">
</form>
</div>
<div id="content2" style="display:block;"  class="contenidopago">
<h1>Efectivo </h1>
<p>Tu pedido estará siendo atendido por nuestros vendedores, de estar aprobado u desaprobado se te notificará a tu correo o lo podrás visualizar actualizando tu perfil (Aproximadamente se demora 1 dia). RECUERDA QUE DESPUES DE SER APROBADO TENDREMOS TUS PRODUCTOS RESERVADOS SOLOPOR 5 DIAS, LUEGO DE ELLO SE ANULARÁ SU PEDIDO.
</p>
<form action="procesoPE.php" method="post">
<input type="hidden" value="<?php echo $Regisid; ?>" id="id" name="id"  > 
<input type="hidden" value="<?php echo 'P000'.$cnt; ?>" id="codentrega" name="codentrega"  >
<input type="hidden" value="<?php echo $Regisnombre; ?>" id="nombre" name="nombre"  > 
<input type="hidden" value="<?php

 

foreach($_SESSION['CARRITO'] as $indice=>$producto){
  $pdt=$producto['cantidad'].' - '.$producto['nombre'].' = S/.'.$producto['precio']*$producto['cantidad'] .' , ';
  
$json = '{"nombre":"'.$producto['nombre'].'","cantidad":"'.$producto['cantidad'].'","precio":"'.$producto['precio'].'"}';

$obj = json_decode($json);
$name=$obj->{'nombre'};
$cantidad=$obj->{'cantidad'};
$price=$obj->{'precio'};
$totalprice=$price*$cantidad;

$descripcion=$cont."). ".$cantidad." ".$name." COSTO ".$totalprice." ";

}


?>" id="descripcion" name="descripcion"  >

<input type="hidden"  value="<?php echo $Regiscelular; ?>" id="celular" name="celular"  >
<input type="hidden" value="<?php echo $totalprice; ?>" id="precio" name="precio"  > 
<input type="hidden" value="<?php echo $Regiscorreo; ?>"  id="correo" name="correo" >
<input type="hidden" value="<?php echo $Regisdni; ?>" id="dni" name="dni">
<input type="hidden" value="<?php echo $Regiscodigoseguridad; ?>" id="codsecreto" name="codsecreto">
<input type="hidden" value="3" id="estado" name="estado">
<input type="hidden" value="2" id="pago" name="pago">



<a href="cartAction.php?action=placeOrder" ><input  class="btn btn-primary btn-lg"  value="Enviar Mi Pedido"></a>
<a href="datos.php" ><input  style="    margin-top: 5px;
    background: indianred;" class="btn btn-primary btn-lg"  value="Volver"></a>
</form>
</div>
<div id="content3" style="display:none;"  class="contenidopago">
<h1>Transferencias    </h1>
<p>Pronto se activará esta forma de pago.</p>
</div>
</div>

<script type="text/javascript">
function showContent() {
   
   var element = document.getElementById("content");
   var element2 = document.getElementById("content2");
   var element3 = document.getElementById("content3");

    check = document.getElementById("checktarjeta");
    checke = document.getElementById("checkefectivo");
    checkes = document.getElementById("checktransferencia");

    if (check.checked) {

        element.style.display='block';
      
        element2.style.display='none';
        element3.style.display='none';
  
    }
    else if(checke.checked){
        element2.style.display='block';
        element.style.display='none';
       
        element3.style.display='none';
    }
    else if(checkes.checked){
        element3.style.display='block';
      
        element2.style.display='none';
        element.style.display='none';
    }
    else {
  

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
       

    <script>

  Culqi.publicKey = 'pk_test_Fay7VmQnDM3AknFQ';



  var nombre="";

var apellido="";


var total="S/.<?php echo number_format($total,2); ?>"; 
var ciudad="";

var estado="";
var pago="";
var celular="";


var title= "Dragon Table Tenis";

var subtitle="Club de Tenis de Mesa"

  var producto = '<?php echo $json_array; ?>';

  var precio="<?php echo  round($total, 0, PHP_ROUND_HALF_DOWN).'00'; ?>";

$('#buyButton').on('click', function(e) {
    
    Culqi.settings({

    title: title,

    currency: 'PEN',

    description: subtitle,

    amount:precio

  });

    Culqi.open();

    e.preventDefault();

});

 
function pedidoe(){
  var id = document.formus.id.value;
  var codigoentrega=document.formus.codentrega.value;
    var nombre = document.formus.nombre.value;
   var celular = document.formus.celular.value;
   var dni = document.formus.dni.value;
   var codseguridad = document.formus.codsecreto.value;
 var estado=document.formus.estado.value;
 var pago=document.formus.pago.value;
 var correo=document.formus.correo.value;
      
      var data={producto:producto,
       precio:precio,
       correo:correo,
       codigoentrega:codigoentrega,
         id:id,
         nombre:nombre,
          celular:celular,
          dni:dni,
          total:total,
          codseguridad:codseguridad,
          estado:estado,
          pago:pago
        };


  $.ajax({
                data:  data, //datos que se envian a traves de ajax
                url:   'procesoPE.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                      $("#loadpage").show();
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    window.location = response;
                }
        });

}

function culqi() {

  if (Culqi.token) { 
    var id = document.formu.id.value;
    var nombre = document.formu.nombre.value;
   var celular = document.formu.celular.value;
   var dni = document.formu.dni.value;
   var codseguridad = document.formu.codsecreto.value;
 var estado=document.formu.estado.value;
 var pago=document.formu.pago.value;
      var token = Culqi.token.id;
      var email = Culqi.token.email;
      
      var data={producto:producto,
       precio:precio,
        token:token,
         email:email,
         id:id,
         nombre:nombre,
          celular:celular,
          dni:dni,
          total:total,
          codseguridad:codseguridad,
          estado:estado,
          pago:pago
        };


  $.ajax({
                data:  data, //datos que se envian a traves de ajax
                url:   'proceso.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                beforeSend: function () {
                      $("#loadpage").show();
                },
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                    window.location = response;
                }
        });

  

  }

else { // ¡Hubo algún problema!

      // Mostramos JSON de objeto error en consola

      console.log(Culqi.error);

      alert(Culqi.error.user_message);

  }

};

</script>

    <script src="admin/vendor/jquery/jquery.min.js"></script>

    <script src="admin/vendor/popper.js/umd/popper.min.js"> </script>

    <script src="admin/vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="admin/js/grasp_mobile_progress_circle-1.0.0.min.js"></script>

    <script src="admin/vendor/jquery.cookie/jquery.cookie.js"> </script>

    <script src="admin/vendor/chart.js/Chart.min.js"></script>

    <script src="admin/vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/web-animations/2.3.1/web-animations.min.js"></script>
    <script src="admin/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="admin/js/charts-home.js"></script>

<!-- Main File-->

<script src="admin/js/front.js"></script>
</body>
</html>