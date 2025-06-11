<?php

    class Banco{
        public static function getConn(){
            return new PDO("mysql:host=localhost;dbname=catalogo_animes", "root", "");
        }
    }

?>