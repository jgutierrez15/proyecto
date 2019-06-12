<?php

  session_start();

// Cargamos Requests y Culqi PHP

require '/request/library/Requests.php';

Requests::register_autoloader();

require '/culqui/lib/culqi.php';


include "admin/db.php";

// Configurar tu API Key y autenticación

$SECRET_KEY = "sk_test_LWX2fTgFiPFEBDNp";

$culqi = new Culqi\Culqi(array('api_key' => $SECRET_KEY));

// Creamos Cargo a una tarjeta

$charge = $culqi->Charges->create(

    array(

      "amount" => $_POST['precio'],

      "capture" => true,

      "currency_code" => "PEN",

      "description" => $_POST['producto'],

      "email" => $_POST['email'],

      "installments" => 0,

      "antifraud_details" => array(

          "address" =>$_POST['email'],

          "address_city" => "Lima",

          "country_code" => "PE",

          "first_name" =>$_POST['nombre'],

          "last_name" => "",

          "phone_number" => $_POST['celular'],

      ),

      "source_id" => $_POST['token'],

    )

);

function limpiarAsunto($asunto)
{
    $cadena = "Subject";
    $longitud = strlen($cadena) + 2;
    return substr(
        iconv_mime_encode(
            $cadena,
            $asunto,
            [
                "input-charset" => "UTF-8",
                "output-charset" => "UTF-8",
            ]
        ),
        $longitud
    );
}

$asunto = limpiarAsunto("CASOLI VENTA POR ECOMMERCE");
$destinatario = strip_tags(htmlspecialchars($_POST['email']));
$encabezados = "MIME-Version: 1.0" . "\r\n";
# ojo, es una concatenación:
$encabezados .= "Content-type:text/html; charset=UTF-8" . "\r\n";
$encabezados .= 'From: Casoli Llantas<contacto@parzibyte.me>' . "\r\n";
$mensaje = '<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Este es un mensaje</title>
    <style type="text/css">
        h1{
            color: #FBC000;
        }
        p{
            font-size: 1rem;
        }
        img{
            width: 10rem;
            height: 10rem;
        }
    </style>
</head>
<body>
<h1>COMPRA DRAGON TABLE TENIS</h1>
<p>Hola este es tu codigo de compra - >'.' '.$_POST['token'].'</p>
<p>
TU LISTA DE PRODUCTOS -> '.$_POST['producto'].'
</p>
<p>
CLIENTE -> '.$_POST['nombre'].'
</p>
<p>
PRECIO TOTAL A PAGAR -> '.$_POST['total'].'</p>

</body>';
$mensaje = wordwrap($mensaje, 70, "\r\n");
$resultado = mail($destinatario,$asunto, $mensaje, $encabezados); 

if ($resultado) {
    echo "respuesta.php";
} else {
    echo "problemas";
}



?>