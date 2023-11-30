
<?php
include("connection/connect.php"); 
error_reporting(0);
session_start();

include_once 'product-action.php';
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: index.php"); 
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>Pide tu comida</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/dishes.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
        
    <?php $ress= mysqli_query($db,"select * from restaurant where rs_id='$_GET[res_id]'");
							 $rows=mysqli_fetch_array($ress);		    
										  
										  ?>
        <section class="inner-page-hero" >
            <div class="profile">
                <div class="containedd">
                    <div class="menu-left">
                        <div class="img_a">
                        <?php echo '<img class="img_a" src="'.$rows['img_rest'].'" alt="Restaurant logo">'; ?>
                    </div>
                    <div class="logo_a">
                        <div class="fia" >
                        <?php echo '<img class="img_r" src="'.$rows['image'].'" alt="Restaurant logo">'; ?>
                        </div>
                        <div id="tu">
                            <h6 id="saq"><a href="#"><?php echo $rows['title']; ?></a></h6>
                            <h2 class="dq" ><?php echo $rows['address']; ?></h2>
                        </div>
                        <div id="ccss">
                            <div id="chackra" >
                            <span id="text_d" >Delivery<i class="fa-regular fa-clock"></i></span><span class="relojw2">19 min</span>

                            </div>
                            <div id="chackra" >
                            <span id="text_d" >Envio<i class="fa-solid fa-person-biking"></i></span><span class="relojw2">$ 4.900</span>

                            </div>
                            <div id="chackra" >
                            <span id="text_d" >Califaciones</span><span class="relojw2"><i class="fa-solid fa-star"></i>4.3</span>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       

        <div class="container_slime ">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

                    
                    <div class="col-md-8">
                        
                        
                        <div class="menu-widget" id="2">
                            <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Novedades
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="collapse in" id="popular2">
                            <?php  
									$stmt = $db->prepare("select * from dishes where rs_id='$_GET[res_id]'");
									$stmt->execute();
									$products = $stmt->get_result();
									if (!empty($products)) 
									{
									foreach($products as $product)
                                    {
                                        
                                        
                                        
                                        ?>
                          
                          <div class="food-item">
                              <div class="row">
                                  <div class="col-xs-12 col-sm-12 col-lg-8">
                                      <form class="form" method="post" action='dishes.php?res_id=<?php echo $_GET['res_id'];?>&action=add&id=<?php echo $product['d_id']; ?>'>
                                      <div id="sdasdq">

                                          <div id="as">
                                              <div class="rest-descr">
                                                  <h4 class="text_de"><a href="#"><?php echo $product['title']; ?></a></h4>
                                                  <p class="desc"> <?php echo $product['slogan']; ?></p>
                                                  <div clas="asd">
                                                    
                                                  <?php
echo '<span class="price"><i class="fa-solid fa-tags"></i>$ ' . number_format($product['price'], 0, ',', '.') . '</span>';
?>                                                     
                                                        <div class="buo">

                                                            <i class="fa-solid fa-minus"></i>
                                                            <input class="b-r-0" type="text" name="quantity" style="margin-left:30px;" value="1" size="2" />
                                                            <i class="fa-solid fa-plus"></i>
                                                        </div>         
                                                      <input type="submit" class="btn2 theme-btn" style="margin-left:40px;" value="Agregar al carrito" />
                                                  </div>
                                                </div>
                                            
                                          </div>
                                            <div class="rest-logo pull-left">
                                                  <a class="restaurant-logo pull-left" href="#"><?php echo '<img id="product_aaa"src="'.$product['detalles_img'].'" alt="Food logo">'; ?></a>
                                              </div>
                                            
                                        </div>
                                      </div>  
                                    
                                </form>
                            </div>
                            
                        </div>
                        
                        
                        
                        <?php
									  }
									}
									
                                    ?>



</div>

</div>


</div>

</div>

</div>
</div>


<div class="otro">

    <div class="widget widget-cart">
        <div class="widget-heading">
            <div class="header_canasta">

                <h3 class="widget-title text-dark">
                    Tu canasta
                </h3>
            </div>
    
    
            <div class="clearfix"></div>
        </div>
        <div class="order-row bg-white">
            <div class="widget-body">
    
    
                <?php
    
    $item_total = 0;
    
    foreach ($_SESSION["cart_item"] as $item)  
    {
    ?>
                <div class="descro">
                    <div class="resta_name">
                        <?php echo '<img class="car_img" src="'.$rows['image'].'" alt="Restaurant logo">'; ?>
                            
                        <span class="s2132"> <?php echo $rows['title']; ?></span>
                        </div>
                    <div class="title-row">
                        <div class="line">
                            <div id="padd">
                                <div class="inline-f">
                                    
                                    <a class="restaurant-logo2 pull-left" href="#"><?php echo '<img id="product_aaa2"src="'.$product['detalles_img'].'" alt="Food logo">'; ?></a>
                                       <span id="w2">
                                       <?php echo $item["title"]; ?><a id="" href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>"> </a>
                                       </span> 
                                       
                                </div>
                                <div class="inline-f">
                                    <input type="text" class="form-control b-r-02" value=<?php echo "$".$item["price"]; ?> readonly id="exampleSelect1">
                                    <div id="manje">

                                        <a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
                                            <i class="fa fa-trash pull-right"></i></a>   
                                        <input class="form-control2" type="text" readonly value='<?php echo $item["quantity"]; ?>' id="example-number-input">
                                        <i class="fa-solid fa-plus" id="s123"></i>
                                    </div>
                                </div>
                                    
                                
                            </div>
                        </div>
                    </div>
        

                    <div class="form-group row no-gutter">
                        <div class="col-xs-8">
                        </div>
                        <div class="col-xs-4">
                        </div>
        
                    </div>
        
                    <?php
        $item_total += ($item["price"]*$item["quantity"]); 
        }
        ?>
            
        
                </div>
            </div>

                </div>
    
    
    
        <div class="widget-body2">
            <div class="price-wrap text-xs-center">
                
                <h3 class="value"><strong></strong></h3>
                <p></p>
                <?php
                        if($item_total==0){
                        ?>
    

                <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="">
                        <div id="no_pago">
                            <div id="car_a">
                            <i class="fa-solid fa-cart-shopping" id="a21"></i>
                                
                        </div>
                        <p class="s2">Aun no tienes productos en tu canasta</p>
                        </div>    
            </a>
    
                <?php
                        }
                        else{   
                        ?>
                        <div id="boton_pagar">
                            <a href="checkout.php?res_id=<?php echo $_GET['res_id'];?>&action=check" class="btn3 btn-success btn-lg active"><span id="aw12">Ir a pagar </span> <span id="asd12">Subtotal: </span><?php echo " $ ".$item_total; ?></a>
                            <a href="dishes.php?res_id=<?php echo $_GET['res_id']; ?>&action=remove&id=<?php echo $item["d_id"]; ?>" >
                                                        <i class="fa fa-trash pull-right" id="a"></i></a>

                        </div>
                <?php   
                        }
                        ?>
    
            </div>
        </div>
</div>



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