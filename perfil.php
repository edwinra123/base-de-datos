<?php
include("connection/connect.php");  
error_reporting(0);  
session_start(); 
if (isset($_GET['logout'])) {
  session_destroy();
  header("Location: index.php"); 
  exit();
}
$nombreUsuario = $_SESSION['user_name'];
$emailUsuario = $_SESSION['user_emailv'];
$apellidoUsuario = $_SESSION['user_apellido'];
$celularUsuario = $_SESSION['user_celular'];
$dniUsuario = $_SESSION['user_dni'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" href="css/perfil.css">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link rel="stylesheet" href="../css/perfil2.css">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>
</head>
<body>
<header id="header_menu2">
<div id="gava100">
    <button id="gava101">
      <a class="inici"href="index.php">
          <i class="fa-solid fa-chevron-left"></i>
            Inicio
        </a>
    </button>
    <script>
        document.getElementById("gava101").addEventListener("click", function() {
            window.location.href = "index2.php";
        });
    </script>

         
    
        </div>
        <div id="textgava"></div>
        <div id="perfil">
        <i class="fa-solid fa-location-dot"></i>
        <p id="location">
            <a id="ae3e"href="">
               

            </a>
        </p>
        <i class="fa-solid fa-angle-down"></i>
        <div id="compras">
        <i class="fa-solid fa-cart-shopping"></i>
        <span id="comprasid">0</span>
        </div>
        <div id="separador"></div>
        
        <form method="post" action="">
    <button type="submit"name="logout" id="logout-button"><a href="?logout" class="nav-link active">Cerrar Sesión</button></a>
</form>

        </div>
    </header>
    <div id="perfildiv">
        <div id="perfil2">
            <div id="perfilsection">
                <div id="figureimg">
                    <figure id="uytt"><i class="fa-solid fa-user"></i></figure>
                    <span id="perfilname">Mi perfil</span>
                    <span id="perfilname1"><?php echo $nombreUsuario; ?></span>
                </div>
                <ul id="perfiloptions">
                    <li class="optionsp"><a  id="p1"href=""><i class="fa-solid fa-wrench"></i>Ajustes de cuenta</a></li>
                    <li class="optionsp"> <a  id="p2"href=""><i class="fa-solid fa-money-bill"></i>Pagos</a></li>
                    <li class="optionsp"> <a  id="p3"href=""><i class="fa-solid fa-rotate-right"></i>Ultimas ordenes</a></li>
                    <li class="optionsp"> <a  id="p4"href=""><i class="fa-regular fa-bell"></i>Centro de notificaciones</a></li>
                    <li class="optionsp"> <a  id="p5"href=""><i class="fa-solid fa-circle-info"></i>Centro de ayuda</a></li>
                    <li class="optionsp"> <a  id="p6"href=""><i class="fa-solid fa-mobile"></i>Telefono</a></li>


                </ul>
            </div>
            <form id="forms"action="">

                <div class="seccion" id="seccion1">
        <span id="sectiontex">  Informacion de tu cuenta</span>
        <fieldset id="context">
            <label id="primer_nombre">
                Nombres(s)
            </label>
            <input type="text" minlength="3" maxlength="25"   id="perfilname2"value="<?php echo $nombreUsuario; ?>">
   
        </fieldset>
        <fieldset id="context2">
            <label id="segundo_nombre">
                Apellido(s)
            </label>
            <input type="text" minlength="3" maxlength="25"   id="perfilname3"value="<?php echo $apellidoUsuario; ?>">
        </fieldset>
        <br>
        <fieldset id="context">
        <label id="primer_nombre">
                Correo Electronico
            </label>
            <input type="email" minlength="3" maxlength="25"   id="perfilname4"value="<?php echo $emailUsuario; ?>">
   
        </fieldset>
        <fieldset id="context2">
            <label id="segundo_nombre">
                Celular
            </label>
            <input type="text" minlength="3" maxlength="25"   id="perfilname5"value="<?php echo $celularUsuario; ?>">
        </fieldset>
        <br>
        <fieldset id="context">
        <label id="primer_nombre">
                Numero de identidad
            </label>
            <input type="text" minlength="3" maxlength="25"   id="perfilname6"value="<?php echo $dniUsuario; ?>">
   
        </fieldset>
  </div>

  <div class="seccion " id="seccion2">
     
      <div id="text_metodos">
          <span id="metodostitle"><i class="fa-regular fa-credit-card"></i>Metodos de pagos</span>
          <span id="deudastitle"><i class="fa-solid fa-dollar-sign"></i>Deudas pendientes</span>
          <div id="divmetodos"class="hidden">
              <div id="metodospago">
                  <button  id="agregar" type="button"><i class="fa-solid fa-plus"></i></button>
                  
                  <button id="efectivo"><img src="https://images.rappi.com/payment_methods/circle-cash.png" id="efectivoicon" alt=""></button>
                </div>
            </div>
            <div id="divdeudas"class="hidden">
                <div id="mostrardeudas"></div>
            </div>
        </div>
        
        <div id="tarjeta" class="hidden">
              <div id="tarjetamargin">
                <div id="titletarjeta">
                <button type="button" id="retroceder"><i class="fa-solid fa-chevron-left"></i>Metodos de pago</button>
               <br>
               <div id="titletarjeta2">
                   <span id="titletarjeta2">Agregar nuevo metodo de pago</span>

               </div>
            </div>
            <div id="buttontarjetas">
                <ul id="tark">
                    <li id="gdg">
                        <div id="icontawd">
                            <div id="icontarjet">
                                <img height="30px" width="30px"src="https://images.rappi.com/payment_methods/cc_round.png" alt="">
                               <span id="w131">Credito o Debito (con CVV)</span>
                            </div>

                        </div>
                        <div id="bancos">
                            <div id="logobanco">
                                <img height="25px" width="25px"src="https://images.rappi.com/payment_methods/diners_round_100.png" alt="">
                            </div>
                            <div id="logobanco">
                                <img height="25px" width="25px"src="https://images.rappi.com/payment_methods/amex_round_100_2.png" alt="">
                            </div>
                            <div id="logobanco">
                                <img height="25px" width="25px"src="https://images.rappi.com/payment_methods/visa_round_100_2.png" alt="">
                            </div>
                            <div id="logobanco">
                                <img height="25px" width="25px"src="https://images.rappi.com/payment_methods/master_round_100_2.png" alt="">
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
              </div>
          </div>
          <script>
    const divTextMetodos = document.getElementById('text_metodos');
    const divTarjeta = document.getElementById('tarjeta');
    const botonAgregar = document.getElementById('agregar');
    const botonRetroceder = document.getElementById('retroceder');

    botonAgregar.addEventListener('click', function () {
        divTextMetodos.classList.add('hidden'); // Oculta text_metodos
        divTarjeta.classList.remove('hidden'); // Muestra tarjeta
        botonRetroceder.addEventListener('click', function () {
            divTextMetodos.classList.remove('hidden'); // Muestra text_metodos
            divTarjeta.classList.add('hidden'); // Oculta tarjeta
        });
    });
    </script>
        <script>
            const divMetodos = document.getElementById('divmetodos');
            const divDeudas = document.getElementById('divdeudas');
            
            const spanMetodos = document.getElementById('metodostitle');
            const spanDeudas = document.getElementById('deudastitle');
            
            spanMetodos.addEventListener('click', function () {
                divDeudas.classList.add('hidden');
                divMetodos.classList.toggle('hidden');
                spanDeudas.classList.remove('active');
                spanMetodos.classList.toggle('active');
            });
            
            spanDeudas.addEventListener('click', function () {
                divMetodos.classList.add('hidden');
                divDeudas.classList.toggle('hidden');
                spanMetodos.classList.remove('active');
                spanDeudas.classList.toggle('active');
            });
            
            </script>
  </div>
  
  <div class="seccion" id="seccion3">
    Contenido de Últimas órdenes.
  </div>

  <div class="seccion" id="seccion4">
    Contenido de Centro de notificaciones.
  </div>

  <div class="seccion" id="seccion5">
    Contenido de Centro de ayuda.
  </div>

  <div class="seccion" id="seccion6">
    Contenido de Teléfono.
  </div>
  <script>
    const enlaces = document.querySelectorAll('.optionsp a');
    const secciones = document.querySelectorAll('.seccion');
    
    enlaces.forEach((enlace, index) => {
        enlace.addEventListener('click', (event) => {
            event.preventDefault(); 
            secciones.forEach(seccion => {
                seccion.classList.remove('mostrar');
            });
            secciones[index].classList.add('mostrar');
        });
    });
  </script>
            </form>

        </div>
    </div>
</body>
</html>