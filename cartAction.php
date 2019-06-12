<?php
// initialize shopping cart class
include 'Cart.php';
$cart = new Cart;

// include database configuration file
include 'admin/db.php';
$db=con();
if(isset($_REQUEST['action']) && !empty($_REQUEST['action'])){
    if($_REQUEST['action'] == 'addToCart' && !empty($_REQUEST['id'])){
        $productID = $_REQUEST['id'];
        // get product details
        $query = $db->query("SELECT * FROM products WHERE id = ".$productID);
        $row = $query->fetch_assoc();
        $itemData = array(
            'id' => $row['id'],
            'name' => $row['name'],
            'price' => $row['price'],
            'folder' => $row['folder'],
            'src' => $row['src'],
            'qty' => 1
        );
        
        $insertItem = $cart->insert($itemData);
        $redirectLoc = $insertItem?'tienda.php':'tienda.php';
        header("Location: ".$redirectLoc);
    }elseif($_REQUEST['action'] == 'updateCartItem' && !empty($_REQUEST['id'])){
        $itemData = array(
            'rowid' => $_REQUEST['id'],
            'qty' => $_REQUEST['qty']
        );
        $updateItem = $cart->update($itemData);
        echo $updateItem?'ok':'err';die;
    }elseif($_REQUEST['action'] == 'removeCartItem' && !empty($_REQUEST['id'])){
        $deleteItem = $cart->remove($_REQUEST['id']);
        header("Location: compra.php");
    }elseif($_REQUEST['action'] == 'placeOrder' && $cart->total_items() > 0 && !empty($_SESSION['sessCustomerID'])){
        // insert order details into database
        $insertOrder = $db->query("INSERT INTO orders (customer_id,email ,total_price,id_estado_pedido,id_forma_pago,cod_secreto, created, modified) VALUES ('".$_SESSION['sessCustomerID']."', '".$_SESSION['correo']."', '".$cart->total()."', '8','1' ,'".$_SESSION['codigosecreto']."','".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
        
        if($insertOrder){
            $orderID = $db->insert_id;
            $sql = '';
            // get cart items
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
                $sql .= "INSERT INTO order_items (order_id, product_id, quantity) VALUES ('".$orderID."', '".$item['id']."', '".$item['qty']."');";
                $db->query("UPDATE products SET stock = stock - ".$item['qty']." WHERE id = ".$item['id']."");
            }

            // insert order items into database
            $insertOrderItems = $db->multi_query($sql);
            
            

            
            if($insertOrderItems){
              
                header("Location: respuesta.php?id=$orderID");
                
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

$asunto = limpiarAsunto("PEDIDO".$orderID."");
$destinatario = strip_tags(htmlspecialchars($_SESSION['correo']));
$encabezados = "MIME-Version: 1.0" . "\r\n";
# ojo, es una concatenación:
$encabezados .= "Content-type:text/html; charset=UTF-8" . "\r\n";
$encabezados .= 'From: Dragon Table Tennis PingPong<grupo5@gmail.com>' . "\r\n";
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
<h1>PEDIDO #'.$orderID.' DRAGON TABLE TENIS</h1>
<p>Número de Pedido   :'.' '.$orderID.'</p>
<p>Codigo secreto para recoger producto   :'.' '.$_SESSION['codigosecreto'].'</p>
<p>
Nombre de Cliente -> '.$_SESSION['nameUSER'] .'
</p>
<p>
Total a Pagar -> '.$cart->total().'</p>

<h1>RECUERDA QUE SOLO TIENES 7 DÍAS PARA RECOGER TU PEDIDO, DESPUES DEL DÍA MENCIONADO TU PEDIDO SE CANCELARÁ </h1>

</body>';
$mensaje = wordwrap($mensaje, 70, "\r\n");
$resultado = mail($destinatario,$asunto, $mensaje, $encabezados); 


            }else{
                header("Location: checkout.php");
            }
        }else{
            header("Location: checkout.php");
        }
    }else{
        header("Location: tienda.php");
    }
}else{
    header("Location: tienda.php");
}