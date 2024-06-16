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
