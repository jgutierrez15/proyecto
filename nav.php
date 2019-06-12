
<?php include 'Cart.php';
$cart = new Cart;  ?>

<header id="headmain">
   <div class="logohead">
           <img src="images/logo.png" alt="">
       </div>
   <nav id="menu">
 
     <ul class="no_list">
     <?php foreach($encabezados as $img):?>
         <li><a href="<?php echo $img->url_enc; ?>"><?php echo $img->nom_enc; ?></a></li>
         <?php endforeach;?>

         <?php if($varsesion == null || $varsesion == ''){ ?>
         <li  class="carrito"><a href="logusuario.php"><i class="fas fa-user-tie"></i>Ingresar</a></li>
         <li style="display:none;"  class="carrito"><a href="miperfil.php"><i class="fas fa-user-tie"></i> Perfil</a></li>
         <?php }else{ ?>
          <li  style="display:none;" class="carrito"><a href="logusuario.php"><i class="fas fa-user-tie"></i>Ingresar</a></li>
       
         <li  class="carrito"><a href="admin/logoutpage.php"><i class="fas fa-sign-out-alt"></i> Salir</a></li>
         <li  class="carrito"><a href="miperfil.php"><i class="fas fa-user-tie"></i> Perfil</a></li>
         <?php }?>
       <li class="carrito"><a  href="compra.php"><i class="fas fa-shopping-cart"></i> <?php echo $cart->total_items() ?></a></li>

     </ul>
     
 </nav>
  

   </header>
