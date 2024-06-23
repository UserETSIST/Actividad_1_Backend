<?php
    require_once('../ConfigDB.php');

    class Platform
    {
        private $id;
        private $name;

        public function __construct($id, $name)
        {
            $this->id = $id;
            $this->name = $name;
        }

        public static function getAll() {
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $query = $mysqli->query("SELECT * FROM plataformas");
            $listData = [];

            foreach($query as $item) {
                $itemObject = new Platform($item['ID'],$item['Nombre']);
                array_push($listData,$itemObject);
            }

            return $listData;   
        }


        public static function getItem($platformId) {
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $itemObject = null;
            $query = $mysqli->query("SELECT * FROM plataformas WHERE ID = $platformId ");

            if($query != null){
                foreach ($query as $item) {
                    $itemObject = new Platform($item['ID'],$item['Nombre']);
                    break;                
                }
            }

            return $itemObject;   
        }



        public static function store($name) {
            $platformCreated = false;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $insertNuevaPlataforma = true;

            $nombresPlataformas = $mysqli->query("SELECT Nombre FROM plataformas");
            
            foreach($nombresPlataformas as $nombre) {
                if (strtolower($nombre[0]) === strtolower($name)) {
                         $insertNuevaPlataforma = false;
                        break;
                        }
            }

            if ($insertNuevaPlataforma) {
                if ($mysqli -> query("INSERT INTO plataformas (Nombre) VALUES ('$name')")){
                    $platformCreated = true;
                }
            }    
            return $platformCreated;
        }




        public static function update($platformId,$name) {
            $platformUpdated = false;
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
                if ($mysqli -> query("UPDATE plataformas set Nombre = '$name' where id = $platformId")){
                    $platformUpdated = true;
                }
            }    
            return $platformUpdated;
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
