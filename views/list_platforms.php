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
    <div class="col-12">
        <br>
        <h2>Lista De Plataformas</h2>
        <div class="d-flex justify-content-start">
            <a class="btn btn-primary" href="./create_platform.php">Nuevo</a>
        </div>
        <br>
        <div class="col-12">
            <?php
            
            $platformList = listPlatforms();

            if (count($platformList) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($platformList as $platform) {
                        ?>
                            <tr>
                                <td><?php echo $platform->getId(); ?></td>
                                <td><?php echo $platform->getName(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-success" href="edit_platform.php?id=<?php echo $platform->getId(); ?>">Editar</a>
                                        <form name="delete_platform" action="delete_platform.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="platformId" value="<?php echo $platform->getId(); ?>" />
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
                    Aún no existen plataformas.
                </div>
            <?php
            }
            ?>
        </div>
</body>