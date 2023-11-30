<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $server = "localhost";
    $username = "root";
    $db_password = "";
    $database = "code_camp_bd_fos";

    try {
        $conn = new PDO("mysql:host=$server;dbname=$database", $username, $db_password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        
        if ($password != $cpassword) {
            $message = "Las contraseñas no coinciden";
        } else {
            
            $stmt = $conn->prepare("SELECT u_id FROM users WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($existingUser) {
                $message = "El usuario ya está registrado con este correo electrónico";
            } else {
                
                $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

                $stmt = $conn->prepare("INSERT INTO users (username, l_name, f_name, email, phone, password) VALUES (:username, :lastname, :firstname, :email, :phone, :password)");
                $stmt->bindParam(':username', $username);
                $stmt->bindParam(':lastname', $lastname);
                $stmt->bindParam(':firstname', $firstname);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':phone', $phone);
                $stmt->bindParam(':password', $hashedPassword);
                $stmt->execute();
                header("Location: login.php");
                exit();
            }
        }
    } catch (PDOException $e) {
        echo "Error al conectar a la base de datos: " . $e->getMessage();
        exit();
    }
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
    <title>Registration</title>
    <link rel="stylesheet" href="css/registro.css">
    <link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <link rel="stylesheet" href="../css/perfil2.css">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>
</head>

<body>
    
            <section class="contact-page inner-page">
                <img src="fondo2.jpg" id="fondo-left"alt="">
                <div class="container ">
                   
                                    <form id="form"action="" method="post">
                                        <div class="row">
                                            <h1 class="ds">Comienza tu registro</h1>
                                            <div id="as2">
                                                <span class="s2">¿Ya comenzaste a recibir tu comida en tu casa? <a class="s6"href="login.php">continua aqui.</a></span>

                                            </div>
                                            
                                            <div class="form-group col-sm-12">
                                                
                                                <input class="form-control" placeholder="NOMBRE DE USUARIO" id="w1" type="text" name="username">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                
                                                <input class="form-control" placeholder="PRIMER NOMBRE" id="w2" type="text" name="firstname">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                
                                                <input class="form-control" placeholder="APELLIDO" type="text" name="lastname" id="example-text-input-2">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                
                                                <input type="text" placeholder="EMAIL" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                                            </div>
                                            <div class="form-group col-sm-6">
                                                
                                                <input class="form-control" placeholder="TELEFONO" type="text" name="phone" id="example-tel-input-3">
                                            </div>
                                            <div id="separador">

                                                <div class="form-group col-sm-3">
                                                   
                                                    <input type="password" placeholder="CONTRASEÑA" class="form-control" name="password" id="exampleInputPassword1">
                                                </div>
                                                <div class="form-group col-sm-7">
                                                    
                                                    <input type="password" placeholder="REPETIR CONTRASEÑA" class="form-control" name="cpassword" id="exampleInputPassword2">
                                                </div>
                                            </div>
                                            

                                        </div>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <p> <input type="submit" value="Registrar cuenta" name="submit" class="btn theme-btn"> </p>
                                            </div>
                                        </div>
                                    </form>

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