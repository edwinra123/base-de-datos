
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
error_reporting(0);
session_start();
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: index.php"); // Puedes redirigir a la página de inicio u otra página después de cerrar sesión
  exit();
}
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Restaurants</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/restaurante.css">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
</head>

<body>
    
<div id="overlay"></div>
    <header id="header" class="header-scroll top-header headrom">
        <nav class="navbar">
        <i id="menu_icon" class="fas fa-bars"></i>
        <div id="border"></div>
    <div id="nav_menu">
    <ul id="dropdown_menu">
      <div id="cerrar">

        <li><button id="close_menu_button"><i class="fas fa-circle-xmark"></i></button></li>
      </div>
      <div id="botonesregistro">
          <div id="enlacesbotones">

            <a href="" id="enlace5">
    
            </a>
  
         
          <a href="" id="enlace5">
            
          </a>
          </div>
      </div>
      <div id="secciones">
        <span id="graga">SECCIONES</span>
        <ul id="lista_secciones">
          <li id="sda"><a href="#">Restuarantes<i class="fa-solid fa-chevron-right"></i></a></li>
          <li id="sda"><a href="#">Tiendas<i class="fa-solid fa-chevron-right"></i></a></li>
        </ul>

      </div>
      <div id="separador">
        <img id="sepa1" width="60" height="60"src="https://www.rappi.com.co/mf-header/header_assets/promo_icon_wc.webp" alt="">
        <span id="anuncio_text">Pide lo que quieras en RapiFood</span>
      </div>
      <div id="otros">
        <span id="graga">OTROS</span>
        <ul id="lista_secciones">
          <li id="sda2"><a href="#">Registra tu restuarante</a></li>
          <li id="sda2"><a href="#">Registra tu tienda</a></li>
          <li id="sda2"><a href="#">Pautas RapiFood</a></li>
        
        </ul>
      </div>
      <div id="pais">
        <span id="sda"> <a><img src="https://images.rappi.com/web-assets/col-flag.png" id="img-pais"alt=""> Colombia <i class="fa-solid fa-chevron-right"></i></a></span>
      </div>
  </ul>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
      const navMenu = document.getElementById("nav_menu");
      const menuIcon = document.getElementById("menu_icon");
      const closeMenuButton = document.getElementById("close_menu_button");
      const overlay = document.getElementById("overlay");

      
      overlay.style.display = "none";

      menuIcon.addEventListener("click", function() {
        navMenu.classList.toggle("opened"); 

        
        if (navMenu.classList.contains("opened")) {
          overlay.style.display = "block";
        } else {
          overlay.style.display = "none";
        }
      });

      closeMenuButton.addEventListener("click", function() {
        navMenu.classList.remove("opened"); 
        overlay.style.display = "none"; 
      });
    });

</script>

            <div class="container_menu">
                <a class="navbar-brand" href="index.php"> <h1 class="title_logo">RappiDash</h1> </a>
                <div class="collapse" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="nav-item"> <a class="nav-link active" href="index.php">Inicio <span class="sr-only"></span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="restaurants.php">Restaurantes <span class="sr-only"></span></a> </li>
                     

                        <?php
						if(empty($_SESSION["user_id"])) 
							{
								echo '<li class="nav-item"><a href="login.php" class="nav-link active">Iniciar</a> </li>
							  <li class="nav-item"><a href="registration.php" class="nav-link active">Registrar</a> </li>';
							}
						else
							{
                if (isset($_SESSION['user_id'])) {
                $username = $_SESSION['user_name'];
                
              }
              else{
                $username="usuario";
              }   
                  
              echo ' <li class="nav-item"><a href="?logout" class="nav-link active">Cerrar sesión</a></li>';
									echo '<li id="usuario" class="nav-item">'.'<i class="fa-regular fa-user"></i><a href="perfil.php" >' .$username.'</a></li>';
							}

						?>

                    </ul>

                </div>
            </div>
        </nav>

    </header>
    <div class="page-wrapper">
       <div id="constulas">

       </div>
    
       

        <section class="restaurants-page">
            <div class="containerw">
                <div class="row_www">
                    <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">
                        <h1> Restaurantes que estan disponibles</h1>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                        <div class="bg-gray restaurant-entry">
                            <div class="row21">
                                <?php $ress= mysqli_query($db,"select * from restaurant");
									      while($rows=mysqli_fetch_array($ress))
										  {
													
						
													 echo' <div id="warp"class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
															<div class="entry-logo">
																<a class="img-fluid" href="dishes.php?res_id='.$rows['rs_id'].'" > 
                                                                <img class="sa2"src="'.$rows['img_rest'].'" class="d" alt="Food logo">
															</div>
															<!-- end:Logo -->
															<div class="entry-dscr">
																<h5 class="aaa"><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> 
                                                                <span id="ss21"class="temp"><i class="fa-regular fa-clock"></i>' . $rows['duracion']. ' min </span>
                                                                <i id="ds" class="fa-solid fa-utensils"></i>
                                                                <span id="esp">Número de productos</span>
															</div>
															<!-- end:Entry description -->
														</div>
														
														</a>'
                                                            ;
                                                            
										  }
						
						
						?>

                            </div>

                        </div>



                    </div>


                 
                </div>
            </div>
    </div>
    </section>

   

    <script src="js/jquery.min.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/animsition.min.js"></script>
    <script src="js/bootstrap-slider.min.js"></script>
    <script src="js/jquery.isotope.min.js"></script>
    <script src="js/headroom.js"></script>
    <script src="js/foodpicky.min.js"></script>
</body>


</html>