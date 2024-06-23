<?php
    require_once('../models/Platform.php');
    
    function listPlatforms() {
        return Platform::getAll();
    }

    function storePlatform($platformName) {
        if (!isset($platformName) || trim($platformName) === '' || strlen(trim($platformName)) <= 2) {
            return false;
        }
        else return Platform::store($platformName);
    }

    function updatePlatform($platformID,$newPlatformName) {
        if (!isset($newPlatformName) || strlen(trim($newPlatformName)) <= 2 || !isset($platformID)) {
            return false;
        }
        return Platform::update($platformID,$newPlatformName);
    }

    function getPlatform($idPaltform) {
        if(is_int($idPaltform)){
            echo "entro";
            exit();
            return Platform::getItem($idPaltform);
        }
        return null;
    }

?>
