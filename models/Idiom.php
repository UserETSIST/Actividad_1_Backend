<?php
    require_once('../ConfigDB.php');

    class Idiom
    {
        private $id;
        private $name;
        private $isoCode;

        public function __construct($id, $name, $isoCode)
        {
            $this->id = $id;
            $this->name = $name;
            $this->isoCode = $isoCode;
        }

        public static function getAll() {
            echo "Entro en ". __FUNCTION__;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $query = $mysqli->query("SELECT * FROM idiomas WHERE Activo = '1'");
            $listData = [];

            foreach($query as $item) {
                $itemObject = new Idiom($item['ID'],$item['Nombre'], $item["ISOCode"],$item['Activo']);
                array_push($listData,$itemObject);
            }

            return $listData;   
        }


        public static function getItem($idomId) {
            echo "Entro en ". __FUNCTION__;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $itemObject = null;
            $query = $mysqli->query("SELECT * FROM idiomas WHERE ID = $idomId AND Activo = '1' ");
            if($query->rowCount() > 0){
                foreach ($query as $item) {
                    $itemObject = new Idiom($item['ID'],$item['nombre'],$item["ISOCode"],$item['Activo']);
                    break;                
                }
            }
            return $itemObject;   
        }



        public static function store($name,$isoCode) {
            echo "Entro en ". __FUNCTION__;
            echo $name."    ".$isoCode;
            $idiomCreated = false;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $insertNewIdiom = true;

            $idioms = $mysqli->query("SELECT * FROM idiomas");
            // echo "<br>";
            foreach($idioms as $idiom) {
                // echo "Comparo Nombre: ".$idiom['nombre']."<->".$name." ISO:".$idiom['ISOCode']."<->".$isoCode."<br>";
                if((strtolower($idiom['ISOCode']) === strtolower($isoCode)) or (strtolower($idiom['nombre']) === strtolower($name))){
                    $insertNewIdiom = false;
                    break;
                }
            }
            // var_dump($insertNewIdiom);
            // exit();
            if ($insertNewIdiom) {
                $isoCode=strtoupper($isoCode);
                if ($mysqli -> query("INSERT INTO idiomas (nombre,ISOCode,Activo) VALUES ('$name','$isoCode','1')")){
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
            $updateNewIdiom = true;

            $idioms = $mysqli->query("SELECT * FROM idiomas WHERE Activo = '1'");
            
            foreach($idioms as $idiom) {
                if (strtolower($idiom['nombre']) === strtolower($name) or (strtolower($idiom['ISOCode']) === strtolower($isoCode))) {
                         $updateNewIdiom = false;
                         break;
                        }
            }

            if ($updateNewIdiom) {
                if ($mysqli -> query("UPDATE idiomas set nombre = '$name', ISOCode = '$isoCode' where id = $idiomId")){
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
            if($mysqli->query("UPDATE idiomas set Activo = '0' WHERE ID = $platformId ")){
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



        public function getISO()
        {
            return $this->isoCode;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setSISO($iso)
        {
            $this->isoCode = $iso;

            return $this;
        }
    }
?>
