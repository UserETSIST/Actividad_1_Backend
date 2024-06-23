<?php
    require_once('../models/Idiom.php');
    
    function listIdioms() {
        echo "Entro en ". __FUNCTION__;
        return Idiom::getAll();
    }

    function storeIdiom($idiom,$iso) {
        echo "Entro en ". __FUNCTION__;
        if (!isset($idiom) || trim($idiom) === '' || strlen(trim($idiom)) <= 2 || !isset($iso) || trim($iso) === '' || strlen(trim($iso)) <= 1) {
            return null;
        }
        else return Idiom::store($idiom,$iso);
    }

    function updateIdiom($idiomID,$newIdiom,$newISO) {
        echo "Entro en ". __FUNCTION__;
        if (!isset($newIdiom) || strlen(trim($newIdiom)) <= 2 ||!isset($newISO) || strlen(trim($newISO)) <= 1 || !isset($idiomID) || !is_numeric($idiomID)) {
            return null;
        }
        return Idiom::update($idiomID,$newIdiom, $newISO);
    }

    function getIdiom($idiomID) {
        echo "Entro en ". __FUNCTION__;
        if(is_numeric($idiomID)){
            return Idiom::getItem($idiomID);
        }
        return null;
    }

    function deleteIdiom($idiomID) {
        if(is_numeric($idiomID)){
            return Idiom::delete($idiomID);
        }
        return false;

    }

?>
