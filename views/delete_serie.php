<?php 
    require_once("../controllers/SerieController.php"); 
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
        $serieId = $_POST['serieId'];
        $serieDeleted = deleteSerie($serieId);

        if($serieDeleted) {
        ?>
            <div class="row">
                <div class="alert alert-success" role="alert">
                    Serie borrada correctamente.<br><a href="list_series.php">Volver al listado de series.</a>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    La serie no se ha borrado.<br><a href="list_series.php">Volver a intentarlo.</a>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
</body>