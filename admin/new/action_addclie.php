<?php

include "../db.php";

include "../class.upload.php";



/// mostrar errores

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);







$handle = new Upload($_FILES["imagen"]);



  $handle->Process("../uploads/");

  if ($handle->processed) {

    // usamos la funcion insert_img de la libreria db.php

    insert_admin($_POST["user"],$_POST["pass"],$_POST["nombre"],$_POST["dni"],$_POST["celular"],2,"uploads/",$handle->file_dst_name);

  } else {

    insert_admin($_POST["user"],$_POST["pass"],$_POST["nombre"],$_POST["dni"],$_POST["celular"],2,"uploads/","null.jpg");

  }



unset($handle);



include "../action_logcliente.php";

header("Location:../../index.php");





?>