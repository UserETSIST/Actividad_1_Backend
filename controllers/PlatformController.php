<?php
    require_once('../models/Platform.php');
    
    function listPlatforms() {
        echo "Entro en ". __FUNCTION__;
        return Platform::getAll();
    }

    function storePlatform($platformName) {
        echo "Entro en ". __FUNCTION__;
        if (!isset($platformName) || trim($platformName) === '' || strlen(trim($platformName)) <= 2) {
            return null;
        }
        else return Platform::store($platformName);
    }

    function updatePlatform($platformID,$newPlatformName) {
        echo "Entro en ". __FUNCTION__;
        if (!isset($newPlatformName) || strlen(trim($newPlatformName)) <= 2 || !isset($platformID) || !is_numeric($platformID)) {
            echo "enro aqui?";
            exit();
            return null;
        }
        return Platform::update($platformID,$newPlatformName);
    }

    function getPlatform($idPlatform) {
        echo "Entro en ". __FUNCTION__;
        if(is_numeric($idPlatform)){
            return Platform::getItem($idPlatform);
        }
        return null;
    }

    function deletePlatform($idPlatform) {
        if(is_numeric($idPlatform)){
            return Platform::delete($idPlatform);
        }
        return false;

    }

?>
