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
    $idIdiom = $_GET['id'];
    $platformObject = getIdiom($idIdiom);
    $sendData = false;
    $idiomEdited = false;
    if(isset($_POST['editBtn'])){
        $sendData = true;
    }
    if($sendData) {
        if(isset($_POST['idiomName']) && isset($_POST['idiomISO']) && $platformObject != NULL) {
            $idiomEdited = updateIdiom($_POST['idiomId'],$_POST['idiomName'], $_POST['idiomISO']);
        }
    }
    if(!$sendData) {
    ?>
    <div class="row">   
        <div class="col-12">
            <h1> Editar Plataforma</h1>
            <br>
        </div>
        <div class="col-12">
            <form name="edit_platform" action="" method="POST">
                <div class="mb-3">
                    <label for="idiomName" class="form-label">Nombre idioma</label>
                    <input id="idiomName" name="idiomName" type="text" placeholder="Introduce el nombre del idioma" class="form-control" required value="<?php if(isset($platformObject)) echo $platformObject->getName(); else echo 'El idioma no existe..no pongas IDs raros en la URL...' ?>" />
                    <input type="hidden" name="idiomId" value="<?php echo $idIdiom; ?>"/>
                </div>
                <div class="mb-3">
                    <label for="idiomISO" class="form-label">ISO Idioma</label>
                    <input id="idiomISO" name="idiomISO" type="text" placeholder="Introduce el código ISO del idioma" class="form-control" required value="<?php if(isset($platformObject)) echo $platformObject->getISO(); else echo 'El codigo ISO del idioma no existe..no pongas IDs raros en la URL...' ?>" />
                    <input type="hidden" name="idiomId" value="<?php echo $idIdiom; ?>"/>
                </div>

                <input type="submit" value="Editar" class="btn btn-primary" name="editBtn"/>
                <a class="btn btn-danger" href="list_idioms.php">Cancelar</a>
            </form>
        </div>
    </div>  
        <?php
            } else {
                if ($idiomEdited) {
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
                            El idioma no se ha creado correctamente.<br><a href="edit_idiom.php?id=<?php echo $idIdiom; ?>">Volver a intentarlo.</a>
                        </div>
                    </div>
                    <?php
                }
            }
            
            ?>


</body>
