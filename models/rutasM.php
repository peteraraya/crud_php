<?php

class Modelo{

    // sera estatica porque llevara parametros
    static public function RutasModelo($rutas){

        if ($rutas == "ingreso" || $rutas == "registrar" || $rutas == "empleados" || $rutas == "editar" || $rutas == "salir") {
            
            $pagina = "views/modulos/".$rutas.".php";
        }else if ($rutas == "index"){

            $pagina ="views/modulos/ingreso.php";
        }else{
            $pagina ="views/modulos/ingreso.php";
        }

        return $pagina;
    }


}



