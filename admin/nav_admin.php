<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->

          <?php while($row = mysqli_fetch_array($result))
{  ?>

<?php if($row["nom_tipo_user"]=="Cliente"){
  	echo 'Usted no tienen autorización para ingresar al admin';
    die();
}  ?>
          <div class="sidenav-header-inner text-center"><img src="<?php echo $row["folder"].$row["src"]; ?>" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5"><?php echo $row["user"]?> </h2><span><?php echo $row["nom_tipo_user"]?> </span>
          </div>

          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">

<h5 class="sidenav-heading">Gestor de Contenidos</h5>

<ul id="side-main-menu" class="side-menu list-unstyled">  

    

<li><a href="gestion_usuarios.php">  Administradores </a></li>
  <li><a href="encabezado.php"> Encabezado                             </a></li>
  <li><a href="noticias.php"> Noticias                             </a></li>
  <li><a href="productos.php"> Productos                             </a></li>
  <li><a href="categorias.php"> Categorias                             </a></li>
  <li><a href="#exampledropdownDropdown" aria-expanded="false" data-toggle="collapse"></i>Slider</a>



  <ul id="exampledropdownDropdown" class="collapse list-unstyled ">

      <li><a href="slidep.php">Principal</a></li>



    </ul>

  </li>
  <li><a href="#exampledropdownDropdowns" aria-expanded="false" data-toggle="collapse"></i>Pedidos</a>



  <ul id="exampledropdownDropdowns" class="collapse list-unstyled ">
      <li><a href="#">Tarjeta</a></li>
      <li><a href="efectivo.php">Efectivo</a></li>
      <li><a href="#">Transferencias</a></li>
    </ul>

  </li>
  <li><a href="footer.php"> Pie de Pagina                             </a></li>

</ul>

</div>


</div>

</nav>

    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <p style="color:white;"><?php echo $row["nom_user"]?></p>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
              
                <!-- Log out-->
                <li class="nav-item"><a href="logout.php" class="nav-link logout"> <span class="d-none d-sm-inline-block">Logout</span><i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
                
  <?php } ?>