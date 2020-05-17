<?php

class RutasControlador{

    public function Plantilla(){
        
        include "views/plantilla.php";
    }

      public function Rutas(){
        // si la variable get viene con info
       if (isset($_GET["ruta"])) {
           $rutas = $_GET["ruta"];
       }else{
           $rutas = "index";
       }


       $respuesta = Modelo::RutasModelo($rutas);

       include $respuesta;
    }

}


