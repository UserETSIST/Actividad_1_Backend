<?php
    require_once('../models/Serie.php');
    
    function listSeries() {
        echo "Entro en ". __FUNCTION__;
        return Serie::getAll();
    }

    function storeSerie($idiom,$iso) {
        echo "Entro en ". __FUNCTION__;
        if (!isset($idiom) || trim($idiom) === '' || strlen(trim($idiom)) <= 2 || !isset($iso) || trim($iso) === '' || strlen(trim($iso)) <= 1) {
            return null;
        }
        else return Serie::store($idiom,$iso);
    }

    function updateSerie($idiomID,$newIdiom,$newISO) {
        echo "Entro en ". __FUNCTION__;
        if (!isset($newIdiom) || strlen(trim($newIdiom)) <= 2 ||!isset($newISO) || strlen(trim($newISO)) <= 1 || !isset($idiomID) || !is_numeric($idiomID)) {
            return null;
        }
        return Serie::update($idiomID,$newIdiom, $newISO);
    }

    function getSerie($idiomID) {
        echo "Entro en ". __FUNCTION__;
        if(is_numeric($idiomID)){
            return Serie::getItem($idiomID);
        }
        return null;
    }

    function deleteSerie($serieId) {
        if(is_numeric($serieId)){
            return Serie::delete($serieId);
        }
        return false;

    }

?>
