<?php
include("conexiondb.php");
$sql="SELECT fotos.*, COUNT(likes.id) as num_likes FROM fotos LEFT JOIN likes ON fotos.id = likes.idfoto GROUP BY fotos.id;";
$fotos=$conexion->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FormacomBook</title>
    <link rel="stylesheet" href="registro.css">
</head>
<body>
    <section class="galeria">
    <?php foreach($fotos as $foto): ?>
        <article>
        <h2><?php echo $foto["titulo"]; ?></h2>
        <img src="<?php echo $foto["foto"]; ?>" alt="">
        <p><?php echo $foto["num_likes"]; ?> Likes</p>
        <a class="add_like" href="like.php?idfoto=<?php echo $foto["id"]; ?>">Like</a>
        </article>
        <?php endforeach; ?>
    </section>
</body>
</html>