<?php 
    require_once("../controllers/IdiomController.php"); 
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
        $idiomId = $_POST['idiomId'];
        $idiomDeleted = deleteIdiom($idiomId);

        if($idiomDeleted) {
        ?>
            <div class="row">
                <div class="alert alert-success" role="alert">
                    Idioma borrado correctamente.<br><a href="list_idioms.php">Volver al listado de idiomas.</a>
                </div>
            </div>
            <?php
        } else {
            ?>
            <div class="row">
                <div class="alert alert-danger" role="alert">
                    El idioma no se ha borrado.<br><a href="list_idioms.php">Volver a intentarlo.</a>
                </div>
            </div>
            <?php
        }
        ?>
        </div>
</body>