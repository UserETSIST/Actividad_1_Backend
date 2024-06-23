<?php
    require_once('../models/Actor.php');
    
    function listActors(){
        return Actor::getAll();

    }

    function insertActor($actorName, $actorSurname, $actorBirthdate, $nationality){
        $newActor = new Actor(idActor, $actorName, $actorSurname, $actorBirthdate, $nationality);
        $actorCreated = $newActor-->store();

        return $actorCreated;
    }

?>
