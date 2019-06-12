<?php

session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);


error_reporting(E_ALL);
if( !function_exists( 'array_column' ) ):
    
    function array_column( array $input, $column_key, $index_key = null ) {
    
        $result = array();
        foreach( $input as $k => $v )
            $result[ $index_key ? $v[ $index_key ] : $k ] = $v[ $column_key ];
        
        return $result;
    }
endif;
$mensaje="";

$nombre="";

$mensajenom="";

        
   

 

$nuevacantidad = 1;
if(isset($_POST['btnAccion'])){

    switch($_POST['btnAccion']){

        case 'Agregar':

        if(is_string(openssl_decrypt($_POST['id'],COD,KEY))){

            $id=openssl_decrypt($_POST['id'],COD,KEY);

            $mensaje.="CODIGO".$id."<br>";



        }else{

            $mensaje.="UPSSSSSSSSSSSSSSSS".$id."<br>";

        }

   if(is_string(openssl_decrypt($_POST['nombre'],COD,KEY))){

        $nombre=openssl_decrypt($_POST['nombre'],COD,KEY);

        $mensaje.="NOMBRE :".$nombre."<br>";

        $mensajenom="NOMBRE :".$nombre."<br>";

    }else{

        $mensaje.="UPSSSSSSSSSSSSSSSS nombre".$nombre."<br>";

    

    break;

}

if(is_numeric(openssl_decrypt($_POST['precio'],COD,KEY))){

    $precio=openssl_decrypt($_POST['precio'],COD,KEY);

    $mensaje.="PRECIO :".$precio."<br>";



}else{

    $mensaje.="UPSSSSSSSSSSSSSSSS precio".$precio."<br>";



break;

}

if(is_string(openssl_decrypt($_POST['medida'],COD,KEY))){

    $medida=openssl_decrypt($_POST['medida'],COD,KEY);

    $mensaje.="MEDIDA".$medida."<br>";



}else{

    $mensaje.="UPSSSSSSSSSSSSSSSS medida".$medida."<br>";



break;

}






if(!isset($_SESSION['CARRITO'])){
    $producto=array(
'id'=>$id,'nombre'=>$nombre,'medida'=>$medida,'cantidad'=>$nuevacantidad,'precio'=>$precio
);
$_SESSION['CARRITO'][0]=$producto;
$mensaje='Producto agregado';
}
else{
$idProductos=array_column($_SESSION['CARRITO'],'id');
if(in_array($id,$idProductos)){
$mensaje='Ya está en el carrito';
}
    else{



    $NumeroProductos=count($_SESSION['CARRITO']);

    $producto=array(

        'id'=>$id,'nombre'=>$nombre,'medida'=>$medida,'cantidad'=>$nuevacantidad,'precio'=>$precio



    );

    $_SESSION['CARRITO'][$NumeroProductos]=$producto;

 $mensaje='Producto agregado';

}
   } 







break;

case "Eliminar" :

if(is_string(openssl_decrypt($_POST['id'],COD,KEY))){

    $id=openssl_decrypt($_POST['id'],COD,KEY);

    foreach($_SESSION['CARRITO'] as $indice=>$producto){

if($producto['id']==$id){

    unset($_SESSION['CARRITO'][$indice]);



}

    }



}else{

    $mensaje.="UPSSSSSSSSSSSSSSSS".$id."<br>";

}





break;

}}







?>