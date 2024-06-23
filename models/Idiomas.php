<?php
    require_once('../ConfigDB.php');

    class Idiomas
    {
        private $id;
        private $name;
        private $isoCode;

        public function __construct($id, $name,$isoCode)
        {
            $this->id = $id;
            $this->name = $name;
            $this->isoCode = $isoCode;
        }

        public static function getAll() {
            echo "Entro en ". __FUNCTION__;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $query = $mysqli->query("SELECT * FROM idiomas");
            $listData = [];

            foreach($query as $item) {
                $itemObject = new Idiomas($item['ID'],$item['Nombre'], $item["ISOCode"]);
                array_push($listData,$itemObject);
            }

            return $listData;   
        }


        public static function getItem($idomId) {
            echo "Entro en ". __FUNCTION__;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $itemObject = null;
            $query = $mysqli->query("SELECT * FROM idiomas WHERE ID = $idomId ");
            if($query->rowCount() > 0){
                foreach ($query as $item) {
                    $itemObject = new Idiomas($item['ID'],$item['Nombre'],$item["ISOCode"]);
                    break;                
                }
            }
            return $itemObject;   
        }



        public static function store($name,$isoCode) {
            echo "Entro en ". __FUNCTION__;
            $idiomCreated = false;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $insertNewIdiom = true;

            $idoms = $mysqli->query("SELECT Nombre FROM idiomas");
            
            foreach($idoms as $idiom) {
                if (strtolower($idiom['nombre']) === strtolower($name)) {
                         $insertNewIdiom = false;
                        break;
                        }
            }

            if ($insertNewIdiom) {
                if ($mysqli -> query("INSERT INTO idiomas (Nombre,ISOCode) VALUES ('$name','$isoCode')")){
                    $idiomCreated = true;
                }
            }    
            return $idiomCreated;
        }




        public static function update($idiomId,$name,$isoCode) {
            echo "Entro en ". __FUNCTION__; 
            $idiomUpdated = false;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $updateNuevaPlataforma = true;

            $nombresPlataformas = $mysqli->query("SELECT * FROM plataformas");
            
            foreach($nombresPlataformas as $nombre) {
                if (strtolower($nombre['Nombre']) === strtolower($name)) {
                         $updateNuevaPlataforma = false;
                         break;
                        }
            }

            if ($updateNuevaPlataforma) {
                if ($mysqli -> query("UPDATE idiomas set Nombre = '$name' where id = $idiomId")){
                    $idiomUpdated = true;
                }
            }    
            return $idiomUpdated;
        }

        public static function delete($platformId) {
            echo "Entro en ". __FUNCTION__;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $platformDeleted = false;
            if($mysqli->query("DELETE FROM plataformas WHERE ID = $platformId ")){
                    $platformDeleted = true;
            }
            return $platformDeleted; 

        }



        /**
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }

        /**
         * Get the value of name
         */ 
        public function getName()
        {
            return $this->name;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setName($name)
        {
            $this->name = $name;

            return $this;
        }
    }
?>
