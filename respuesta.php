

<?php include 'Cart.php';
$cart = new Cart;  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dragon Table Tennis</title>
    <style>
    body{
        width:100%;
        height:100%;
        margin:0;
        background: azure;
    }
    .bod{
        margin: 100px 369px;
        text-align:center;
    }
    input{
        background: bisque;
    font-size: 20px;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
    }
    .container{padding: 50px 110px;    padding: 50px 110px;
    text-align: center;
    margin-top: -104px;}
    .container h1{
      color: darkcyan;
    }
    .table{width: 100%;float: left; font-size: 15px;  text-align:center;   font-weight: 700;}
    .shipAddr{width: 30%;float: left;margin-left: 30px;}
    .footBtn{width: 95%;float: left;}
    .orderBtn {float: right;}
    thead{
      color: darkcyan;
    }
    tfoot{
      color: darkcyan;
    }
    </style>
</head>
<body>
<div class="bod">
<img src="images/logo.png" alt=""><br>
  <p> ¡HOLA! TU PEDIDO SE A REALIZADO CON ÉXITO - NUM. PEDIDO :  #<?php echo $_GET['id']; ?> </p>
    
   <a href="index.php"> <input type="button"  value="regresar" name=""></a>

    <h1> ¡<?PHP echo $_SESSION['user']; ?>! revisa tu correo</h1>
    <p style="font-weight:700;"> recordar que solo tienes 7 días para recogerlo, despues de ello el pedido se eliminará automaticante.</p>
    </div>
    <div class="container">
    <h1>¡Aquí tus productos pedidos!</h1>
    <table class="table">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Precio</th>
            <th>Cantidad</th>
            <th>SubTotal</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if($cart->total_items() > 0){
            //get cart items from session
            $cartItems = $cart->contents();
            foreach($cartItems as $item){
        ?>
        <tr>
            <td><?php echo $item["name"]; ?></td>
            <td><?php echo 'S/.'.$item["price"]; ?></td>
            <td><?php echo $item["qty"]; ?></td>
            <td><?php echo 'S/.'.$item["subtotal"]; ?></td>
        </tr>
        <?php } }else{ ?>
        <tr><td colspan="4"><p>No hay Items en la Lista</p></td>
        <?php } ?>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="3"></td>
            <?php if($cart->total_items() > 0){ ?>
            <td class="text-center"><strong>Total <?php echo 'S/.'.$cart->total(); ?></strong></td>
            <?php } ?>
        </tr>
    </tfoot>
    </table>
</div>
<?php   $cart->destroy(); ?>
</body>
</html>