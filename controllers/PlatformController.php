<?php
    require_once('../models/Platform.php');
    
    function listPlatforms(){
        return Platform::getAll();

    }

?>
