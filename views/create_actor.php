<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actores</title>
    <!-- Incluir Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div>
    </div>
    <div class="col-12">
        <br>
            <h2>Lista De Actores</h2>
        <br>
        <div class="d-flex justify-content-start">
            <button class="btn btn-primary" onclick="location.href='nueva_pagina.html'">Nuevo</button>
        </div>
        <br>

        <?php
        require_once("../../controllers/ActorsController.php");
        $actorList = listActors();

        if (count($actorList) > 0) {
        ?>
            <table class="table">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Fecha Nacimeinto</th>
                        <th>Nacionalidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($actorList as $actor) {
                    ?>
                        <tr>
                            <td><?php echo $actor->getId(); ?></td>
                            <td><?php echo $actor->getName(); ?></td>
                            <td><?php echo $actor->getSurname(); ?></td>
                            <td><?php echo $actor->getBirthDate(); ?></td>
                            <td><?php echo $actor->getNationality(); ?></td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a class="btn btn-success" href="edit.php?id=<?php echo $actor->getId(); ?>">Editar</a>
                                    <form name="delete_actor" action="delete.php" method="POST" style="display:inline;">
                                        <input type="hidden" name="actorId" value="<?php echo $actor->getId(); ?>" />
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
                <h3>Aún no existen actores.</h3>            
            </div>
        <?php
        }
        ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>


