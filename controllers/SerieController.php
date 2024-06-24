<?php
    require_once('../models/Serie.php');
    
    function listSeries() {
        echo "Entro en ". __FUNCTION__;
        return Serie::getAll();
    }

    function storeSerie($title,$director,$actor,$platform,$audio,$subitulos) {
        echo "Entro en ". __FUNCTION__;
        if (!isset($title) || trim($title) === '' || strlen(trim($title)) <= 2 ) {
            return null;
        }
        else return Serie::store($title,$director,$actor,$platform,$audio,$subitulos);
    }

    function updateSerie($serieID,$newTitle,$director,$actor,$platform,$audio,$subitulos) {
        echo "Entro en ". __FUNCTION__;
        if (!isset($newTitle) || strlen(trim($newTitle)) <= 2 || !isset($serieID) || !is_numeric($serieID)) {
            return null;
        }
        return Serie::update($serieID,$newTitle,$director,$actor,$platform,$audio,$subitulos);
    }

    function getSerie($serieID) {
        echo "Entro en ". __FUNCTION__;
        if(is_numeric($serieID)){
            return Serie::getItem($serieID);
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
