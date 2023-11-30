
<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: index.php"); 
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
    <title>Pagina Principal</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/restaurante.css">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
</head>


<body class="home">
    
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
    <section class="popular">
        <div class="container">
            <div class="title">
             
                <p class="lead">Productos para ti</p>
            </div>
            <div class="row3">
          
            <?php
$query_res = mysqli_query($db, "SELECT * FROM dishes LIMIT 4");
while ($r = mysqli_fetch_array($query_res)) {
    $porcentaje_descuento = $r['descuento'];
    $precio_formateado = number_format($r['price'], 0, ',', '.');

    echo '<div id="select_productos" class="">
            <div id="ba" class="food-item-wrap">
                <a href="dishes.php?res_id=' . $r['rs_id'] . '">
                <div class="figure-wrap">
                <img id="imas"src="' . $r['img'] . '" alt="' . $r['title'] . '">';
                
                    echo '<span class="oferta"> Hasta ' . $porcentaje_descuento . ' % Off</span>';
                
            
                echo '</div>
                    <div class="content_s">
                        <h5 class="to">' . $r['title'] . '</h5>
                        
                        <div class="price-btn-block">
                            <span class="price2">$ ' .  $precio_formateado . '</span>
                            <span class="temp"><i class="fa-regular fa-clock"></i>' . $r['duracion']. ' min </span>
                            <a href="dishes.php?res_id=' . $r['rs_id'] . '" class="btn theme-btn-dash pull-right">Agregar al carrito</a>
                        </div>
                    </div>
                </a>
            </div>
        </div>';
}
?>
            </div>
        </div>
    </section>
  

    
    <section class="featured-restaurants">
        <div class="container">
            <div class="row2">
                <div class="col-sm-4">
                    <div class="title-block pull-left">
                        <h4>Restaurantes del momento</h4>
                    </div>
                </div>
                
            </div>
 
            <div class="row3">
                <div class="restaurant-listing">


                    <?php  
						$ress= mysqli_query($db,"select * from restaurant");  
									      while($rows=mysqli_fetch_array($ress))
										  {
													
													$query= mysqli_query($db,"select * from res_category where c_id='".$rows['c_id']."' ");
													 $rowss=mysqli_fetch_array($query);
						
													 echo ' <div id="select_productos" class="barrota '.$rowss['c_name'].'">
														<div class="restaurant-wrap">
															<div class="row_s">
                                                            <a class="restaurant-logo" href="dishes.php?res_id='.$rows['rs_id'].'" >
                                                             <img id="resta" src="'.$rows['image'].'" alt="Restaurant logo"> 
																
													
																<div id="aqr"class="col-xs-12 col-sm-9 col-md-12 col-lg-9">
																	<h5><a href="dishes.php?res_id='.$rows['rs_id'].'" >'.$rows['title'].'</a></h5> 
																</div>

															</div>
                                                            </a>
														</div>
												
													</div>';
										  }
						
						
						?>



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