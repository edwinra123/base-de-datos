<!DOCTYPE html>
<html lang="en">
<?php
include("connection/connect.php");
include_once 'product-action.php';
error_reporting(0);
session_start();


function function_alert() { 
      

    echo "<script>alert('Thank you. Your Order has been placed!');</script>"; 
    echo "<script>window.location.replace('your_orders.php');</script>"; 
} 

if(empty($_SESSION["user_id"]))
{
	header('location:login.php');
}
else{
    if ($result && $row = mysqli_fetch_assoc($result)) {
        $direccion_usuario = $row['dirreccion'];
    } else {
        $direccion_usuario = "Dirección no disponible";
    }
    foreach ($_SESSION["cart_item"] as $item)
    {

    $item_total += ($item["price"]*$item["quantity"]);
    
        if($_POST['submit'])
        {

        $SQL="insert into users_orders(u_id,title,quantity,price) values('".$_SESSION["user_id"]."','".$item["title"]."','".$item["quantity"]."','".$item["price"]."')";

            mysqli_query($db,$SQL);
            
            
            unset($_SESSION["cart_item"]);
            unset($item["title"]);
            unset($item["quantity"]);
            unset($item["price"]);
            $success = "El restaurante esta preparando tu comida";

            function_alert();

										  
    
														
														
													}
												}
?>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="css/">
    <title>Tu pedido</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>
    <link href="css/check.css" rel="stylesheet">
    
</head>

<body>

    
        <header id="header" class="header-scroll top-header headrom">
           <h1 class="title"> RappiDash</h1>
        </header>
        <div class="page-wrapper">
            <div class="display">
                <div class="panel2">
                    <div id="dirrecion">
                        
                        <div class="dirrecion_panel1" >
                            <h1 class="a-p">Dirrecion de entrega</h1>
                        </div>
                        
                        <div id="panel-d2">
                        
                            <span class="t_d"><?php
                            $user_id = $_SESSION["user_id"];
                            $query = "SELECT dirreccion FROM users WHERE u_id = $user_id";
                            $result = mysqli_query($db, $query);
                        
                            if ($result && $row = mysqli_fetch_assoc($result)) {
                                $direccion_usuario = $row['dirreccion'];
                            } else {
                                $direccion_usuario = "Dirección no disponible";
                            }
                            
                            echo $direccion_usuario; ?></span>
                            
                            <div class="opciones">
                                <span class="w223">Instrucciones de entrega (opcional)</span>
                            </div>                          
                            <input type="text"value="" class="input">
                        </div>
                        <div id="separador"></div>
                        <div class="dirrecion_panel1" >
                        <i class="fa-solid fa-circle-check"></i><h1 class="a-p">Metodo de pago</h1>
                        </div>
                        
                        <div id="panel-d2">
                            <div id="panel-d">
                                <span >Metodos disponibles:</span>
                                <label for="cash" class="aaqqq" >

                                    <div class="efectivo" >
                                        <div id="title_e">
                                            <div id="container_img3">
                                                <img class="container_img"src="https://images.rappi.com/payment_methods/circle-cash.png?e=webp&q=40&d=10x10" alt="">
                                            </div>
                                            <div class="sy2">Efectivo</div>
                                            <input class="r" type="radio">
                                        </div>
                                    </div>
                                </label>

                            </div>
                        </div>

                </div>
                </div>
                <div class="display2">
                    <form action="" class="d123"method="post">
                      
    
                            <div class="widget-body">
                                <form method="post" action="#">
                                    <div class="row">
                                        <div class="cart-totals-title">
                                            <h4 class="cart_title">Resumen</h4>
                                        </div>
                                                <div class="cart-totals-fields">
                                                    <div id="fila">
                                                        <span id="item1">
                                                            Costo de productos
                                                        </span>
                                                        <span id="price_pr"><?php $formatted_total = number_format($item_total, 0, ',', '.');echo "$ ". $formatted_total; ?></span>
                                                    </div>
                                                    <div id="fila">
                                                    <span id="item1">
                                                            Tarifa de envio
                                                        </span>
                                                        <span id="price_pr"><?php $tarifa_envio=1000; echo"$ ". number_format($tarifa_envio,0,'.', '.'); ?></span>
                                                    </div>
                                                    <div id="fila">
                                                    <span id="item1">
                                                            Tarifa de servicio
                                                        </span>
                                                        <span id="price_pr"><?php $tarifa_envio=3200; echo"$ ". number_format($tarifa_envio,0,'.', '.'); ?></span>
                                                    </div>
                                                    <div id="fila">
                                                        <span id="item1" class="as">Total</span>
                                                        <span id="price_pr"class="as"> <?php
                                                             $item_total;                                                    
                                                            $tarifa_envio = 1000;
                                                            $tarifa_servicio = 3200;

                                                                                                                                                                                $total_con_descuento = $item_total - ($item_total * $descuento_plato2);
                                                        
                                                            $totlaf = $tarifa_servicio + $tarifa_envio+$item_total ;
                                                        
                                                            echo "$ " . number_format($totlaf, 0, '.', '.');
                                                        
                                                        ?>
                                                        </span>
                                                    </div>
                                                    <div id="miDiv">
                                                    <p></p>
                                                    </div>
                                                    <div id="detalles">
                                                        <h1 id="mostrarDiv">Ver detalles</h1>
                                                    </div>     
                                                    
                                                    <script>
                                                        function toggleDiv() {
                                                            var div = document.getElementById('miDiv');
                                                            div.style.display = div.style.display === 'none' ? 'block' : 'none';
                                                        }
                                                        document.getElementById('mostrarDiv').addEventListener('click', toggleDiv);
                                                        </script>
    
                                                 
    
                                                   
                                                </div>
                                                <div class="payment-option">
                                                  
                                                    <p class="text-xs-center"> <input type="submit" onclick="return confirm('Desea confirmar el pedido?');" name="submit" class="boton_pago" value="Hacer pedido"> </p>
                                                </div>
                                            </div>
                                </form>
                            </div>
                        </div>
    
                </div>
            </div>
            </form>

                </div>
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


<?php
}
?>
