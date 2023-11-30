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
        $password = $_POST['password'];

        $stmt = $conn->prepare("SELECT u_id, email, username, l_name, phone, password, rol FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['u_id'];
            $_SESSION['user_emailv'] = $user['email']; 
            $_SESSION['user_name'] = $user['username'];
            $_SESSION['user_apellido'] = $user['l_name'];
            $_SESSION['user_celular'] = $user['phone'];

            if ($user['rol'] == 0) {
                header("Location: index.php");
                exit();
            } elseif ($user['rol'] == 2) {
                header("Location: perfiladmin.php");
                exit();
            } else {
                $message = "Rol de usuario no reconocido";
            }
        } else {
            $message = "Credenciales inválidas";
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
    <meta charset="UTF-8">
    <title>Login</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

    <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
    <link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

    <link rel="stylesheet" href="css/login.css">

    <style type="text/css">
    #buttn {
        color: #fff;
        background-color: rgb(41, 216, 132);
        font-family: 'SF Pro Display', sans-serif;

    }
    </style>

   
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/animsition.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>

<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.cdnfonts.com/css/sf-pro-display" rel="stylesheet">
    <script src="https://kit.fontawesome.com/1e588a4fd9.js" crossorigin="anonymous"></script>
</head>

<body>
    
    <div style=" ">

      

       

        <div class="pen-title">
            < </div>

                <div class="module form-module">
                    <div class="toggle">

                    </div>
                    <div class="form">
                        <h2>Iniciar Sesion</h2>
                        
                        <form action="" method="post">
                            <input type="text" placeholder="Username" name="username" />
                            <input type="password" placeholder="Password" name="password" />
                            <input type="submit" id="buttn" name="submit" value="Iniciar" />
                        </form>
                    </div>

                    <div class="cta">No estas registrado?<a href="registration.php" style="color:rgb(41, 216, 132);"> Crea una cuenta</a></div>
                </div>
                <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>


                <div class="container-fluid pt-3">
                    <p></p>
                </div>



          


</body>

</html>