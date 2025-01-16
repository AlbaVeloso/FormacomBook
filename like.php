<?php
session_start();
if (!isset($_SESSION["id"])) {
        header("location: index.php");
    exit();
}
if (isset($_GET["idfoto"])) {
    try {
        include("conexiondb.php");
        $sql = "INSERT INTO likes (idfoto, idusuario) VALUES (:idfoto, :idusuario)";
        $stm = $conexion->prepare($sql);
        $stm->bindParam(":idfoto", $_GET["idfoto"]);
        $stm->bindParam(":idusuario", $_SESSION["id"]);
        $stm->execute();
        header("location: index.php");
        exit();
    } catch (Exception $e) {
        echo "Ya has votado esta foto";
    }
}

?>