<?php
    require_once('../ConfigDB.php');
    require_once('Idiom.php');
    require_once('Platform.php');

    class Serie
    {
        private $id;
        private $titulo;
        private $director;
        private $actor;
        private $platform;
        private $audio;
        private $subitulos;

        public function __construct($id,$titulo,$director,$actor,$platform,$audio,$subitulos){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->director = $director;
            $this->actor = $actor;
            $this->audio = $audio;
            $this->platform = $platform;
            $this->subitulos = $subitulos;
        }

        public static function getAll() {
            echo "Entro en ". __FUNCTION__;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $query = $mysqli->query("SELECT * FROM series WHERE Activo = '1'");
            $listData = [];

            foreach($query as $item) {
                $itemObject = new Serie($item['ID'],$item['Titulo'],$item['Directores_ID'],$item['Actores_ID'],$item['Plataformas_ID'],$item['IdiomasAudio_ID'],$item['IdiomasSubtitulos_ID'],$item['Activo']);
                array_push($listData,$itemObject);
            }
            return $listData;   
        }


        public static function getItem($serieId) {
            echo "Entro en ". __FUNCTION__;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $itemObject = null;
            $query = $mysqli->query("SELECT * FROM Series WHERE ID = $serieId AND Activo = '1'");
            if($query->rowCount() > 0){
                foreach ($query as $item) {
                    $itemObject = new Serie($item['ID'],$item['Titulo'],$item['Directores_ID'],$item['Actores_ID'],$item['Plataformas_ID'],$item['IdiomasAudio_ID'],$item['IdiomasSubtitulos_ID'],$item['Activo']);
                    break;                
                }
            }
            return $itemObject;   
        }



        public static function store($name,$director,$actor,$platform,$audio,$subitulos) {
            echo "Entro en ". __FUNCTION__;
            $serieCreated = false;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $insertNuevaSerie = true;

            $nombresSeries = $mysqli->query("SELECT Titulo FROM series");
            
            foreach($nombresSeries as $nombre) {
                if (strtolower($nombre[0]) === strtolower($name)) {
                    if ($mysqli -> query("UPDATE series set Activo = '1' WHERE Titulo = '$name'")){
                        $serieCreated = true;
                    }
                        $insertNuevaSerie = false;
                        break;
                        }
            }

            if ($insertNuevaSerie) {
                if ($mysqli -> query("INSERT INTO series (Titulo,Directores_ID,Plataformas_ID,Actores_ID,IdiomasAudio_ID,IdiomasSubtitulos_ID,Activo) VALUES ('$name','$director','$actor','$platform','$audio','$subitulos',1)")){
                    $serieCreated = true;
                }
            }    
            return $serieCreated;
        }




        public static function update($serieId,$name,$director,$actor,$platform,$audio,$subitulos) {
            echo "Entro en ". __FUNCTION__; 
            $serieUpdated = false;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $updateNuevaSerie = true;

            $nombresSeries = $mysqli->query("SELECT * FROM series WHERE Activo = '1'");
            
            foreach($nombresSeries as $nombre) {
                if (strtolower($nombre['Titulo']) === strtolower($name)) {
                         $updateNuevaSerie = false;
                         break;
                        }
            }

            if ($updateNuevaSerie) {
                if ($mysqli -> query("UPDATE series set Titulo = '$name', Directores_ID = '$director', Plataformas_ID  ='$platform', Actores_ID = '$actor', IdiomasAudio_ID = '$audio', IdiomasSubtitulos_ID = '$subitulos' where id = $serieId")){
                    $serieUpdated = true;
                }
            }    
            return $serieUpdated;
        }

        public static function delete($serieId) {
            echo "Entro en ". __FUNCTION__;
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $serieDeleted = false;
            if($mysqli->query("UPDATE series set Activo = '0' WHERE ID = $serieId")){
                    $serieDeleted = true;
            }
            return $serieDeleted; 

        }






        /**
         * Get the value of titulo
         */ 
        public function getTitulo()
        {
                return $this->titulo;
        }

        /**
         * Set the value of titulo
         *
         * @return  self
         */ 
        public function setTitulo($titulo)
        {
                $this->titulo = $titulo;

                return $this;
        }

       

        /**
         * Get the value of subitulos
         */ 
        public function getSubitulos()
        {
            // $mysqliObject = new databaseConnect();
            // $mysqli = $mysqliObject->getConnection();
            // $subtitles = $mysqli->query("SELECT Idiomas.Nombre AS subtitle FROM Series JOIN Idiomas ON Series.IdiomasSubtitulos_ID = Idiomas.ID WHERE Series.ID = '$this->id';");
            // foreach($subtitles as $subtitle){
            //     return $subtitle['subtitle'];
            // }
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $idiom = $mysqli->query("SELECT Idiomas.Nombre AS nombre, Idiomas.ID AS id, Idiomas.ISOCode as iso FROM Series JOIN Idiomas ON Series.IdiomasSubtitulos_ID = Idiomas.ID WHERE Series.ID = '$this->id';");
            foreach($idiom as $subtitule) {
                $subtitlesObject = new Idiom($subtitule['id'],$subtitule['nombre'], $subtitule['iso']);
            }
            return $subtitlesObject;
        }

        /**
         * Set the value of subitulos
         *
         * @return  self
         */ 
        public function setSubitulos($subitulos)
        {
                $this->subitulos = $subitulos;

                return $this;
        }

        /**
         * Get the value of audio
         */ 
        public function getAudio()
        {
            // $mysqliObject = new databaseConnect();
            // $mysqli = $mysqliObject->getConnection();
            // $audios = $mysqli->query("SELECT Idiomas.Nombre AS audio FROM Series JOIN Idiomas ON Series.IdiomasAudio_ID = Idiomas.ID WHERE Series.ID = '$this->id';");
            // foreach($audios as $audio){
            //     return $audio['audio'];
            // }
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $idioms = $mysqli->query("SELECT Idiomas.Nombre AS nombre, Idiomas.ID AS id, Idiomas.ISOCode as iso FROM Series JOIN Idiomas ON Series.IdiomasSubtitulos_ID = Idiomas.ID WHERE Series.ID = '$this->id';");
            foreach($idioms as $idioma) {
                $idiomsObject = new Idiom($idioma['id'],$idioma['nombre'], $idioma['iso']);
            }
            return $idiomsObject;


        }

        /**
         * Set the value of audio
         *
         * @return  self
         */ 
        public function setAudio($audio)
        {
            $this->audio = $audio;

            return $this;
        }

        /**
         * Get the value of actor
         */ 
        public function getActor()
        {
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $actores = $mysqli->query("SELECT Actores.Nombre AS actor, Actores.Apellido as apellido FROM Series JOIN Actores ON Series.Actores_ID = Actores.ID WHERE Series.ID = '$this->id';");
            foreach($actores as $actor){
                return $actor['actor']." ".$actor['apellido'];
            }
        }

        /**
         * Set the value of actor
         *
         * @return  self
         */ 
        public function setActor($actor)
        {
                $this->actor = $actor;

                return $this;
        }

        /**
         * Get the value of director
         */ 
        public function getDirector()
        {   
            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $nombreDirector = $mysqli->query("SELECT Directores.Nombre AS director_nombre, Directores.Apellido AS apellido FROM Series JOIN Directores ON Series.Directores_ID = Directores.ID WHERE Series.ID = '$this->id';");
            foreach($nombreDirector as $nombre){
                return $nombre['director_nombre']." ".$nombre['apellido'];
            }
        }

        /**
         * Set the value of director
         *
         * @return  self
         */ 
        public function setDirector($director)
        {
                $this->director = $director;

                return $this;
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
         * Get the value of plataforma
         */ 
        public function getPlatform()
        {
            // $mysqliObject = new databaseConnect();
            // $mysqli = $mysqliObject->getConnection();
            // $nombrePlataforma = $mysqli->query("SELECT Plataformas.Nombre AS plataforma_nombre FROM Series JOIN Plataformas ON Series.Plataformas_ID = Plataformas.ID WHERE Series.ID = '$this->id';");
            // foreach($nombrePlataforma as $plataforma){
            //     return $plataforma['plataforma_nombre'];
            // }


            $mysqliObject = new databaseConnect();
            $mysqli = $mysqliObject->getConnection();
            $platforms = $mysqli->query("SELECT Plataformas.Nombre AS nombre, Plataformas.ID AS id FROM Series JOIN Plataformas ON Series.Plataformas_ID = Plataformas.ID WHERE Series.ID = '$this->id';");
            foreach($platforms as $platform) {
                $platformObject = new Platform($platform['id'],$platform['nombre']);
            }
            return $platformObject;
        }

        /**
         * Set the value of plataforma
         *
         * @return  self
         */ 
        public function setPlataform($platform)
        {
                $this->platform = $platform;

                return $this;
        }
    }
?>
