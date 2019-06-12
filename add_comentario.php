<?php

include "admin/db.php";



    insert_comentario($_POST["comentario"],$_POST["cod_user"],$_POST["noticia"]);



$link="detallenoticia.php?nom_noticia=".$_POST["nombrenoticia"]."";
header("Location:".$link."");





?>