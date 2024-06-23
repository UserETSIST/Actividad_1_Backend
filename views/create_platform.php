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
    $sendData = false;
    $platformCreated = false;
    if(isset($_POST['createBtn'])){
        $sendData = true;
    }
    if($sendData) {
        
        if(isset($_POST['platformName'])) {
            $platformCreated = storePlatform($_POST['platformName']);
        }
    }
    if(!$sendData) {
    ?>
    <div class="row">   
        <div class="col-12">
            <h1> Crear Plataforma</h1>
            <br>
        </div>
        <div class="col-12">
            <form name="create_platform" action="" method="POST">
                <div class="mb-3">
                    <label for="platformName" class="form-label">Nombre plataforma</label>
                    <input id="platformName" name="platformName" type="text" placeholder="Introduce el nombre de la plataforma" class="form-control" required />
                </div>
                <input type="submit" value="Crear" class="btn btn-primary" name="createBtn"/>
            </form>
        </div>
    </div> 
        <?php
            } else {
                if ($platformCreated) {
                    ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Plataforma creada correctamente.<br><a href="list_platforms.php">Volver al listado de platafformas.</a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            La plataforma no se ha creado correctamente.<br><a href="create_platform.php">Volver a intentarlo.</a>
                        </div>
                    </div>
                    <?php
                }
            }
            
            ?>


</body>
