<?php
    session_start();
    if(!isset($_SESSION['id'])){
        header('location: login.php');
    }
    if(isset($_POST['titulo'])) {            
        include('conexiondb.php');
        $nombreFoto = $_FILES['foto']['name'];
        $ruta = "./fotos/".$nombreFoto;
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $ruta));
            $sql="INSERT INTO fotos (titulo, foto, idusuario) VALUES (:titulo, :foto, :id)";
            $stm=$conexion->prepare($sql);
            $stm->bindParam(":titulo", $_POST["titulo"]);
            $stm->bindParam(":foto", $ruta);
            $stm->bindParam(":id", $_SESSION["id"]);
            $stm->execute();
            header('location: index.php');
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
    <form action="" method="post" enctype="multipart/form-data">
        <label for="">Título</label>
        <input type="text" name="titulo" id="titulo" placeholder="Nombre">
        <label for="">Foto</label>
        <input type="file" name="foto" id="foto" accept="image/*">
        <input type="submit" value="Subir foto">






    </form>
</body>
</html>