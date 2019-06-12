<?php

include "../db.php";


insert_categoria($_POST["nombre"]);




header("Location:../categorias.php");





?>