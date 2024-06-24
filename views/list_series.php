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
    <div class="col-12">
        <br>
        <h2>Lista De Series</h2>
        <div class="d-flex justify-content-start">
            <a class="btn btn-primary" href="./create_serie.php">Nuevo</a>
        </div>
        <br>
        <div class="col-12">
            <?php
            
            $serieList = listSeries();
            if (count($serieList) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titulo</th>
                            <th>Director</th>
                            <th>Actor</th>
                            <th>Plataforma</th>
                            <th>Audio</th>
                            <th>Subtitulos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($serieList as $serie) {
                        ?>
                            <tr>
                                <td><?php echo $serie->getId(); ?></td>
                                <td><?php echo $serie->getTitulo(); ?></td>
                                <td><?php echo $serie->getDirector(); ?></td>
                                <td><?php echo $serie->getActor(); ?></td>
                                <td><?php echo $serie->getPlatform()->getName(); ?></td>
                                <td><?php echo $serie->getAudio()->getName(); ?></td>
                                <td><?php echo $serie->getSubitulos()->getName(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-success" href="edit_serie.php?id=<?php echo $serie->getId(); ?>">Editar</a>
                                        <form name="delete_serie" action="delete_serie.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="serieId" value="<?php echo $serie->getId(); ?>" />
                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            <?php
            } else {
            ?>
                <div class="alert alert-warning" role="alert">
                    Aún no existen series.
                </div>
            <?php
            }
            ?>
        </div>
</body>