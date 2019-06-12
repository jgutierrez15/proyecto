<?php
if(isset($_POST["documento"]))
{
if($_POST["documento"]=="tarjeta"){
    $mensaje="<div>CULQUIIII</div>";
}
else{
    $mensaje="<div>error</div>";
}
echo $mensaje;
}



?>