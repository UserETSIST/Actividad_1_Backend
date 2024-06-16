<div class="col-12">
    <?php
    require_once("../controllers/PlatformController.php");
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
                                <a class="btn btn-success" href="edit.php?id=<?php echo $platform->getId(); ?>">Editar</a>
                                <form name="delete_platform" action="delete.php" method="POST" style="display:inline;">
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
