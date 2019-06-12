<?php
require_once("DBController.php");
$db_handle = new DBController();


  if(empty($_POST['user'])){


echo "vacio";

  }
if(!empty($_POST["user"])) {
  $query = "select * FROM users WHERE user='" . $_POST["user"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span style='color:red;' class='estado-no-disponible-usuario'> Usuario no Disponible.</span>";
  }

  else{
      echo "<span style='color:green;'  class='estado-disponible-usuario'> Usuario Disponible.</span>";
  }
}
?>