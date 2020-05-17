<?php

    class ConexionBD{

        public function cBD(){
            // para conectarse a la bd con pdo utilizamos 3 parametros
            $bd = new PDO("mysql:host=localhost;dbname=crud_php","root","");
            //host, nombre bd ,usuario ,contraseña 
            
            return $bd;
        }
    }


