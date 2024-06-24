<?php 
    require_once("../controllers/SerieController.php"); 
    require_once("../controllers/PlatformController.php");
    require_once("../controllers/IdiomController.php");
    require_once("../controllers/ActorController.php");
    require_once("../controllers/DirectorController.php");
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
    $idSerie = $_GET['id'];
    $serieObject = getSerie($idSerie);
    $sendData = false;
    $serieEdited = false;
    if(isset($_POST['editBtn'])){
        $sendData = true;
    }
    if($sendData) { 
        if(isset($_POST['serieName']) && $serieObject != NULL) {
            $serieEdited = updateSerie($_POST['serieId'],$_POST['serieName'], $_POST['selectDirector'], $_POST['selectActor'], $_POST['selectPlataforma'], $_POST['selectAudio'], $_POST['selectSubs']);
        }
        
    }
    if(!$sendData) {
    ?>
    <div class="row">   
        <div class="col-12">
            <h1> Editar Serie</h1>
            <br>
        </div>
        <div class="col-12">
            <form name="edit_serie" action="" method="POST">
                <div class="mb-3">
                    <label for="serieName" class="form-label">Titulo serie</label>
                    <input id="serieName" name="serieName" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required value="<?php if(isset($serieObject)) echo $serieObject->getTitulo(); else echo 'La serie no existe..no pongas IDs raros en la URL...' ?>" />
                    <input type="hidden" name="serieId" value="<?php echo $idSerie; ?>"/>
                </div>
                <div class="mb-3">
                    <label for="seriePlatform" class="form-label">Plataforma </label>
                    <select name="selectPlatform" id="selectPlatform" required >
                        <?php
                        $listPlatforms = listPlatforms();
                        foreach($listPlatforms as $platform) {
                            echo '<option value="' . $platform->getId() . '">' . $platform->getName() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="serieAudio" class="form-label">Audio </label>
                    <select name="selectAudio" id="selectAudio" required >
                        <?php
                        $listAudios = listIdioms();
                        foreach($listAudios as $audio) {
                            echo '<option value="' . $audio->getId() . '">' . $audio->getName() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="serieSubs" class="form-label">Subtítulos </label>
                    <select name="selectSubs" id="selectSubs" required >
                        <?php
                        $listSubs = listIdioms();
                        foreach($listSubs as $sub) {
                            echo '<option value="' . $sub->getId() . '">' . $sub->getName() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="serieDirector" class="form-label">Director </label>
                    <select name="serieDirector" id="serieDirector" required >
                        <?php
                        $listDirector = listDirectors();
                        foreach($listDirector as $director) {
                            echo '<option value="' . $director->getId() . '">' . $director->getName() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="serieActor" class="form-label">Actor </label>
                    <select name="selectActor" id="selectActor" required >
                        <?php
                        $listActors = listActors();
                        foreach($listActors as $actor) {
                            echo '<option value="' . $actor->getId() . '">' . $actor->getName() . '</option>';
                        }
                        ?>
                    </select>
                </div>
                

                <input type="submit" value="Editar" class="btn btn-primary" name="editBtn"/>
                <a class="btn btn-danger" href="list_series.php">Cancelar</a>
            </form>
        </div>
    </div>  
        <?php
            } else {
                if ($serieEdited) {
                    ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Serie editada correctamente.<br><a href="list_series.php">Volver al listado de series.</a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            La serie no se ha editado correctamente.<br><a href="edit_serie.php?id=<?php echo $idSerie; ?>">Volver a intentarlo.</a>
                        </div>
                    </div>
                    <?php
                }
            }
            
            ?>


</body>
