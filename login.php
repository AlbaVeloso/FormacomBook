<?php
if(isset($_POST["email"])){
    include('conexiondb.php');
    $sql = "SELECT * FROM usuarios WHERE email = :email";
    $stm = $conexion->prepare($sql);
    $stm->bindParam("email", $_POST["email"], PDO::PARAM_STR);
    $stm->execute();
    $usuario = $stm->fetch();

    if($usuario){
        if(password_verify($_POST["password"], $usuario["password"])){
            session_start();
            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];
            header( "Location: nueva_foto.php");
            exit();
        }else{
            echo "Contraseña incorrecta";
        }
    }else{
        echo "Usuario no encontrado";
        exit();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Email</label>
        <input type="text" name="email" id="email" placeholder="Email">
        <label for="">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Contraseña">
        <input type="submit" value="Iniciar sesión">




    </form>
</body>
</html>