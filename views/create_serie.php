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
    $sendData = false;
    $serieCreated = false;
    if(isset($_POST['createBtn'])){
        $sendData = true;
    }
    if($sendData) {
        
        if(isset($_POST['serieName'])) {
            // $serieCreated = storeSerie($_POST['serieName'],$_POST['idiomISO']);
            $serieEdited = storeSerie($_POST['serieName'], $_POST['selectDirector'], $_POST['selectActor'], $_POST['selectPlataforma'], $_POST['selectAudio'], $_POST['selectSubs']);

        }
    }
    if(!$sendData) {
    ?>
    <div class="row">   
        <div class="col-12">
            <h1> Crear Serie</h1>
            <br>
        </div>
        <div class="col-12">
            <form name="create_serie" action="" method="POST">
                <div class="mb-3">
                    <label for="serieName" class="form-label">Nombre serie</label>
                    <input id="serieName" name="serieName" type="text" placeholder="Introduce el nombre de la serie" class="form-control" required />
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
                

                <div class="mb-3">
               
                </div>

                <input type="submit" value="Crear" class="btn btn-primary" name="createBtn"/>
                <a class="btn btn-danger" href="list_series.php">Cancelar</a>
            </form>
        </div>
    </div> 
        <?php
            } else {
                if ($serieCreated) {
                    ?>
                    <div class="row">
                        <div class="alert alert-success" role="alert">
                            Serie creada correctamente.<br><a href="list_series.php">Volver al listado de series.</a>
                        </div>
                    </div>
                    <?php
                } else {
                    ?>
                    <div class="row">
                        <div class="alert alert-danger" role="alert">
                            La serie se ha creado correctamente.<br><a href="create_serie.php">Volver a intentarlo.</a>
                        </div>
                    </div>
                    <?php
                }
            }
            
            ?>


</body>
