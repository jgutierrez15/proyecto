
<?php
require_once("../new/DBController.php");
$db_handle = new DBController();


  if(empty($_POST['contenido'])){


echo "<span style='color:green;'  class='estado-disponible-usuario stado'> Campo Vacío.</span>";

  }
  else{
      echo "<style>.stado{display:none;}</style>";
  }

?>