<?php



 session_start();



$error=''; //Variable to Store error message;

$id_tipo_user="1";

if(isset($_POST['submit'])){

  if(empty($_POST['pass'])){



    $error = "Campo Contraseña vacío";

  }

else if(empty($_POST['user'])){



  $error = "Campo usuario vacío";

}
else if (empty($_POST['user']) || empty($_POST['pass'])){
 $error = "Usuario y Contraseña vacío ";
}


 else



 {



 //Define $user and $pass



 $user=$_POST['user'];



 $pass=$_POST['pass'];







 $_SESSION['user']=$user;



 







 //Establishing Connection with server by passing server_name, user_id and pass as a patameter



$conn=mysqli_connect("localhost","talbacco_alexand","Admin2019","talbacco_dragon");



 $query = mysqli_query($conn, "SELECT * FROM users WHERE pass='$pass' AND user='$user' AND id_tipo_user=1 ");



 $rows = mysqli_num_rows($query);



 if($rows > 0){      header("Location:principal.php");



 }



 $query1 = mysqli_query($conn, "SELECT * FROM users WHERE pass='$pass' AND user='$user' AND id_tipo_user=2");

 $rows2 = mysqli_num_rows($query1);

 if($rows2 > 0){    

   $error = "Usuario sin acceso a Panel";

 }

 else 



 {



 $error = "Usuario o Contraseña es invalido";



 }





 mysqli_close($conn); // Closing connection



 }}



?>