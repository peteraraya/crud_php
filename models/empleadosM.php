<?php

require_once "conexionBD.php";

class EmpleadosM extends conexionBD
{


    // Registrar Empleados

    public static function RegistrarEmpleadosM($datosC, $tablaBD)
    {
        $pdo = conexionBD::cBD()->prepare("INSERT INTO $tablaBD (nombre,apellido,email,puesto,salario) 
                                           VALUES (:nombre, :apellido, :email, :puesto, :salario) ");

        // Vincular parametros
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);

        // Si PDO se ejecuta entonces

        if ($pdo -> execute()) {
            return "Bien hecho";
        } else {
            return "Error al insertar";
        }

        $pdo -> close();
    }

    // Mostrar Empleados

    public static function MostrarEmpleadosM($tablaBD)
    {

            // Pedimos el PDO
        $pdo = conexionBD::cBD()->prepare("SELECT id, nombre, apellido, email, puesto, salario FROM $tablaBD ");

        $pdo -> execute();

        return $pdo -> fetchAll(); // devolvemos una fila o todas las que hayan

        $pdo -> close();
    }


    // Editar Empleado

    public static function EditarEmpleadoM($datosC, $tablaBD)
    {
        $pdo = ConexionBD::cBD()->prepare("SELECT  id, nombre, apellido, email, puesto, salario FROM $tablaBD WHERE id = :id");

        $pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);

        $pdo -> execute();

        return $pdo->fetch(); // retornamos una sola fila

        $pdo -> close();
    }

    //Actualizar Empleado

    public static function ActualizarEmpleadoM($datosC, $tablaBD)
    {
        $pdo = ConexionBD::cBD()->prepare(" UPDATE $tablaBD 
                                                SET nombre   = :nombre, 
                                                    apellido = :apellido ,
                                                    email    = :email ,
                                                    puesto   = :puesto ,
                                                    salario  = :salario
                                                WHERE id = :id ");

        $pdo -> bindParam(":id", $datosC["id"], PDO::PARAM_INT);
        $pdo -> bindParam(":nombre", $datosC["nombre"], PDO::PARAM_STR);
        $pdo -> bindParam(":apellido", $datosC["apellido"], PDO::PARAM_STR);
        $pdo -> bindParam(":email", $datosC["email"], PDO::PARAM_STR);
        $pdo -> bindParam(":puesto", $datosC["puesto"], PDO::PARAM_STR);
        $pdo -> bindParam(":salario", $datosC["salario"], PDO::PARAM_STR);


        if ($pdo -> execute()) {
            return "Bien hecho";
        } else {
            return "Error al insertar";
        }


        $pdo -> close();
    }

     static public function BorrarEmpleadoM($datosC, $tablaBD){

        $pdo = ConexionBD::cBD()->prepare("DELETE FROM $tablaBD WHERE id = :id");

        // Vinculación de parametros
        $pdo -> bindParam(":id", $datosC, PDO::PARAM_INT);

        if ($pdo -> execute()) {
            return "Bien hecho";
        } else {
            return "Error al insertar";
        }


        $pdo -> close();


    }



}
