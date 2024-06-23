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
    <div class="col-12">
        <br>
        <h2>Lista De Idiomas</h2>
        <div class="d-flex justify-content-start">
            <a class="btn btn-primary" href="./create_idiom.php">Nuevo</a>
        </div>
        <br>
        <div class="col-12">
            <?php
            
            $idiomList = listIdioms();

            if (count($idiomList) > 0) {
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>ISO</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($idiomList as $idiom) {
                        ?>
                            <tr>
                                <td><?php echo $idiom->getId(); ?></td>
                                <td><?php echo $idiom->getName(); ?></td>
                                <td><?php echo $idiom->getISO(); ?></td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a class="btn btn-success" href="edit_idiom.php?id=<?php echo $idiom->getId(); ?>">Editar</a>
                                        <form name="delete_idiom" action="delete_idiom.php" method="POST" style="display:inline;">
                                            <input type="hidden" name="idiomId" value="<?php echo $idiom->getId(); ?>" />
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
                    Aún no existen idiomas.
                </div>
            <?php
            }
            ?>
        </div>
</body>