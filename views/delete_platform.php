<?php 
    require_once("../controllers/PlatformController.php"); 
?> 
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botón Nuevo</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <?php
        $idPlatform = $_POST['platformId'];
        $platformDeleted = deletePlatform($idPlatform);

        if($platformDeleted) {
        ?>
            <div class="row">
                <div class="alert alert-success" role="alert">
                    Plataforma borrada correctamente.<br><a href="list_platforms.php">Volver al listado de plataformas.</a>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    La plataforma no se ha borrado.<br><a href="list_platforms.php">Volver a intentarlo.</a>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
</body>