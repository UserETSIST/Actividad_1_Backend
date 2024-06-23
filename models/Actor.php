<?php
    require_once('../ConfigDB.php');

    class Actor
    {
        private $id;
        private $dni;
        private $name;
        private $surname;
        private $birthdate;
        private $nationality;

        public function __construct($id, $dni, $name, $surname, $birthdate, $nationality)
        {
            $this->id = $id;
            $this->dni = $dni;
            $this->name = $name;
            $this->surname = $surname;
            $this->birthdate = $birthdate;
            $this->nationality = $nationality;
        }

        public static function getAll() {
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $query = $mysqli->query("SELECT * FROM actores");
            $listData = [];

            foreach($query as $item) {
                $itemObject = new Actor($item['ID'],  $item['DNI'], $item['Nombre'], $item['Apellido'], $item['FechaNacimiento'], $item['Nacionalidad']);
                array_push($listData,$itemObject);
            }
            return $listData;   
        }

        public static function store() {
            $actorCreate =false;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $query = $mysqli->query("SELECT * FROM actores ");
            $listData = [];

            foreach($query as $item) {
                $itemObject = new Actor($item['ID'], $item['DNI'],  $item['Nombre'], $item['Apellido'], $item['FechaNacimiento'], $item['Nacionalidad']);
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
        public function getDni()
        {
            return $this->dni;
        }

        /**
         * Set the value of name
         *
         * @return  self
         */ 
        public function setDni($dni)
        {
            $this->dni = $dni;

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

       /**
         * Get the value of surname
         */ 
        public function getSurname()
        {
            return $this->surname;
        }

        /**
         * Set the value of surname
         *
         * @return  self
         */ 
        public function setSurname($surname)
        {
            $this->surname = $surname;

            return $this;
        }

       /**
         * Get the value of birthdate
         */ 
        public function getBirthdate()
        {
            return $this->birthdate;
        }

        /**
         * Set the value of birthdate
         *
         * @return  self
         */ 
        public function setBirthDate($birthdate)
        {
            $this->birthdate = $birthdate;

            return $this;
        }   

       /**
         * Get the value of nationality
         */ 
        public function getNationality()
        {
            return $this->nationality;
        }

        /**
         * Set the value of nationality
         *
         * @return  self
         */ 
        public function setNationality($nationality)
        {
            $this->nationality = $nationality;

            return $this;
        }                

    }
?>
