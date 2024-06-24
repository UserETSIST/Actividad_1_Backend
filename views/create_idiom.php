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
    $sendData = false;
    $idiomCreated = false;
    if(isset($_POST['createBtn'])){
        $sendData = true;
    }
    if($sendData) {
        
        if(isset($_POST['idiomName']) && isset($_POST['idiomISO'])) {
            $idiomCreated = storeIdiom($_POST['idiomName'],$_POST['idiomISO']);
        }
    }
    if(!$sendData) {
    ?>
    <div class="row">   
        <div class="col-12">
            <h1> Crear Idioma</h1>
            <br>
        </div>
        <div class="col-12">
            <form name="create_idiom" action="" method="POST">
                <div class="mb-3">
                    <label for="idiomName" class="form-label">Nombre idioma</label>
                    <input id="idiomName" name="idiomName" type="text" placeholder="Introduce el nombre del idioma" class="form-control" required />
                </div>
                <div class="mb-3">
                    <label for="idiomISO" class="form-label">ISO idioma</label>
                    <input id="idiomISO" name="idiomISO" type="text" placeholder="Introduce el ISO del idioma" class="form-control" required />
                </div>

                <input type="submit" value="Crear" class="btn btn-primary" name="createBtn"/>
                <a class="btn btn-danger" href="list_idioms.php">Cancelar</a>
            </form>
        </div>
    </div> 
        <?php
            } else {
                if ($idiomCreated) {
                    ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Idioma creado correctamente.<br><a href="list_idioms.php">Volver al listado de idiomas.</a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            El idioma no se ha creado correctamente.<br><a href="create_idiom.php">Volver a intentarlo.</a>
                        </div>
                    </div>
                    <?php
                }
            }
            
            ?>


</body>
