<?php    
    if(isset($_POST['nombre'])){
        include('conexiondb.php');        
        $sql = "INSERT INTO usuarios (nombre, email, password) VALUES (:nombre, :email, :password)";
        $stm=$conexion->prepare($sql);
        $stm->bindParam("nombre", $_POST["nombre"], PDO::PARAM_STR);
        $stm->bindParam("email", $_POST["email"], PDO::PARAM_STR);
        $has_password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $stm->bindParam("password", $has_password, PDO::PARAM_STR);
        $stm->execute();


    }


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id="nombre" placeholder="Nombre">
        <label for="">Email</label>
        <input type="text" name="email" id="email" placeholder="Email">
        <label for="">Contraseña</label>
        <input type="password" name="password" id="password" placeholder="Contraseña">
        <input type="submit" value="Registrar">
    </form>

   
                  
</body>
</html>