
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
if(empty($_SESSION['user_id']))  
{
	header('location:login.php');
}
else
{
?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="#">
    <title>My Orders</title>
    <link href="css/orders.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css" rel="stylesheet">
        
    </style>
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
<div id="display">

    <div id="content_panel_2" class="paneles_banner" >
                <div id="banner_tabla_pedidos" >
                    <div id="panel1_tabla" >
                        <p>ID ORDEN</p>
                    </div>
                    <div id="panel2_tabla">
                        <p>NOMBRE DEL PRODUCTO</p>
                    </div>
                    <div id="panel3_tabla">
                        <p>MONTO</p>
                    </div>
                    <div id="panel4_tabla" >
                        <p>FECHA</p>
                    </div>
                    
                    <div id="panel5_tabla">
                        <p>ACCION</p>
                    </div>
                </div>
    </div>
    
    <div id="body_table">
    <div id="fila">
        <?php 
        
        $query_res= mysqli_query($db,"select * from users_orders where u_id='".$_SESSION['user_id']."'");
                if(!mysqli_num_rows($query_res) > 0 )
                        {
                            echo '<td colspan="6"><center>You have No orders Placed yet. </center></td>';
                        }
                    else
                        {			      
          
          while($row=mysqli_fetch_array($query_res))
          {
        
        ?>
        
        <span id="w1u1"> <?php echo $row['quantity']; ?></td>
            <span id="w1u2"> <?php echo $row['title']; ?></h1>
            <span id="w1u3">$<?php echo $row['price']; ?></td>
            <span id="w1u4" data-column="status">
        
               
        
        
        
        
        
        
            <span id="w1u5"> <?php echo $row['date']; ?></span>
            <span id="w1u6"> <a href="delete_orders.php?order_del=<?php echo $row['o_id'];?>" onclick="return confirm('Quiere cancelar la orden?');" class="btn5 btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
            
                                   
        <br>
        <?php }} ?>

    </div>
</div>
</div>

                    <div id="tabla">
    
                                <table class="table table-bordered table-hover">
                                    
                                    

                                    </div>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
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
<?php
}
?>