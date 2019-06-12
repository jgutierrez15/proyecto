<?php
include "admin/db.php";
$connect=con();
error_reporting (0);
session_start();
$varsesion = $_SESSION['user'];
$encabezados=get_sec_encabezados();
$idpage = mysqli_real_escape_string($connect, $_GET['nom_noticia']);
$footer=get_footers();

$query="select * from noticias where nom_noticia='$idpage'";

$result=mysqli_query($connect,$query);

$query2="select * from users where user='$varsesion'";
$result2=mysqli_query($connect,$query2);


$query3="select * from users where user='$varsesion'";
$result3=mysqli_query($connect,$query3);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/superslides.css">
    <link rel="icon" type="image/png" href="images/iconobad.ico" />
    <link href="https://fonts.googleapis.com/css?family=Comfortaa:400,700" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <title>Dragon Table Tennis</title>
  
</head>
<body>
<?php include('nav.php') ?>
  <div class="span_fondo">
  <img style="    width: 100%;

height: 100%;
position: absolute;

    z-index: -5;
" src="images/img1.jpg" alt="">
<h1>NOTICIAS</h1>
  </div>
<div id="medle"></div>
<div class="medio_body">
  <div class="title_medio_body">
  <h2 id="notic">Tennis para todos</h2>
  <p style="    margin: 0.2em 0 0.2em 0;
    text-align: center;     color: #948d94;  font-family: 'Comfortaa', cursive;">noticias</p>
  </div>
<div class="content_card">

<?php while($row = mysqli_fetch_array($result))

{

   $codnoticia=$row["cod_noticia"];
  $nomnoticia=$row["nom_noticia"];
    ?>

  <div class="cards cards_detalle">
  <div class="card_images img_detalle">  <img src="<?php echo 'admin/'.$row["folder"].$row["src"]; ?>" alt="noticia" ></div>

    <div class="title_card">
     <h2><?php echo $row["nom_noticia"]?></h2> 
      <p><?php echo $row["created_at"]?></p>
      <div class="info_card">
      <span class="fh5co-metae "  ><?php echo $row["contenido_noticia"]?></span>
      </div>
      </div>
      

      <a href="index.php"><button style="    margin-top: 20px;
    COLOR: white;
    background: lightseagreen ;">MOSTRAR MAS NOTICIAS</button></a>

  </div>
  <?php } ?>

 
<div class="comentarios">
<H1>COMENTARIOS</H1>
<?php 
if($varsesion != null || $varsesion != ''):
 ?>

<form action="add_comentario.php" class="form_comentario" method="post">

<?php 
while($row = mysqli_fetch_array($result2))

{

 ?>

<input type="hidden" name="cod_user" value="<?php echo $row["codigo_user"] ?>">

<?php $usercomentario=$row["user"]; } ?>


<input type="hidden" name="noticia" value="<?php echo $codnoticia; ?>">
<input type="hidden" name="nombrenoticia" value="<?php echo $nomnoticia; ?>">
<textarea style="width:80%; height: 100px;" onkeyup="countChars(this);" name="comentario" id="" cols="30" rows="10"></textarea>
<p id="charNum">0 caracteres</p>

<button type="submit" disabled name="comentar" id="comentar" style="background: lightseagreen; color:white;" class="btn btn-primary mb-2">Comentar</button>
</form>

<?php

$comentarios=get_comentarios($codnoticia);
foreach($comentarios as $img):?>
<div class="comentario">
<img src="<?php echo 'admin/'.$img->folder.$img->src; ?>" alt="">
<?php if( $img->user==$varsesion):

?>
 <a  href="admin/eliminar/action_drop_comentario.php?id_comentario=<?php echo $img->id_comentario; ?>">
<button type="submit" style="position: absolute;
    color: black;
    float: right;
    right: 187px;
    font-size: 30px;
    color: red;" >X</button></a>
<h1 style="    position: absolute;
    margin-left: 11%;
    font-size: 25px;
    color: deepskyblue";><?php echo $img->nom_user; ?></h1>
<textarea type="text" disabled ><?php echo $img->comentario; ?> </textarea>
</div>
<?php else:?>

<h1 style="    position: absolute;
    margin-left: 11%;
    font-size: 25px;
    color: deepskyblue;";><?php echo $img->nom_user; ?></h1>
<textarea type="text" disabled ><?php echo $img->comentario; ?> </textarea>
</div>
<?php endif; ?>
<?php endforeach;?>

</div>
 <?php else: ?>
<?php
$comentarios=get_comentarios($codnoticia);
 foreach($comentarios as $img):?>
<div class="comentario">
<img src="<?php echo 'admin/'.$img->folder.$img->src; ?>" alt="">
<?php if( $img->user==$varsesion):

?>
 <a  href="admin/eliminar/action_drop_comentario.php?id_comentario=<?php echo $img->id_comentario; ?>">
<button type="submit" style="position: absolute;
    color: black;
    float: right;
    right: 0;
    font-size: 30px;
    color: red;" >X</button></a>
<h1 style="    position: absolute;
    margin-left: 11%;
    font-size: 25px;
    color: deepskyblue;";><?php echo $img->nom_user; ?></h1>
<textarea type="text" disabled ><?php echo $img->comentario; ?> </textarea>
</div>
<?php else:?>

<h1 style="    position: absolute;
    margin-left: 11%;
    font-size: 25px;
    color: deepskyblue;";><?php echo $img->nom_user; ?></h1>
<textarea type="text" disabled ><?php echo $img->comentario; ?> </textarea>
</div>
<?php endif; ?>
<?php endforeach;?>

</div>
<?php endif; ?>
 
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


<!----ZONA DE JS ------------------------------------------------->
<script src="js/jquery.superslides.min.js"></script>
<script src="js/truncate.min.js"></script>
<script>

$(document).ready(function(){

$(".tile_cord").each(function(){

var currentElement=$(this);

var config ={

  lines:currentElement.data('truncate-lines'),

  position:currentElement.data('truncate-position')

}



if(!currentElement.data('auto-line-height')){

  config.lineHeight =currentElement.css("line-height");

}

currentElement.truncate(config);

});

});

</script>
<script>

function countChars(obj){
    var maxLength = 500;
    var strLength = obj.value.length;
    
    if(strLength > maxLength){
       
        document.getElementById("charNum").innerHTML = '<span style="color: red;">Superaste el limite de  caracteres</span>';
        $('#comentar').attr('disabled', true);
    }
 
   else if(strLength == 0)
    {
      document.getElementById("charNum").innerHTML = '<span style="color: red;">Debes tener mas de un caracter</span>';
      $('#comentar').attr('disabled', true);
    }
    else{
        document.getElementById("charNum").innerHTML = strLength+' out of '+maxLength+' characters';
        $('#comentar').attr('disabled', false);
    }
}
</script>
</body>
</html>