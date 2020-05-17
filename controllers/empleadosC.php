<?php

class EmpleadosC
{


        // Registrar los empleados

    public function RegistrarEmpleadosC()
    {

            // Preguntamos si la variable post
        if (isset($_POST["nombreR"])) {
            # creamos una variable con datos

         
            $datosC = array("nombre"=>$_POST["nombreR"],
                                "apellido"=>$_POST["apellidoR"],
                                "email"=>$_POST["emailR"],
                                "puesto"=>$_POST["puestoR"],
                                "salario"=>$_POST["salarioR"]);
            $tablaBD = "empleados";

            // Solicitamos una respuesta
            $respuesta = EmpleadosM::RegistrarEmpleadosM($datosC, $tablaBD);

            if ($respuesta == "Bien hecho") {
                header("location:index.php?ruta=empleados");
            } else {
                echo "error";
            }
        }
    }


    // Mostrar los empleados

    public function MostrarEmpleadosC()
    {
        $tablaBD = "empleados";

        $respuesta = EmpleadosM::MostrarEmpleadosM($tablaBD);

        // Pedimos un foreach

        foreach ($respuesta as $key => $value) {
            echo '<tr>
                         <td>'.$value["nombre"].'</td>
                         <td>'.$value["apellido"].'</td>
                         <td>'.$value["email"].'</td>
                         <td>'.$value["puesto"].'</td>
                         <td>'.$value["salario"].'</td>
                        <td><a href="index.php?ruta=editar&id='.$value["id"].'" class="btn btn-info">Editar</a></td>
                        <td><a href="index.php?ruta=empleados&idB='.$value["id"].'" class="btn btn-danger">Borrar</a></td>
                    </tr>
                    ';
        }
    }


    // Editar empleado

    public function EditaEmpleadoC()
    {
        $datosC = $_GET["id"];

        $tablaBD = "empleados";

        $respuesta = EmpleadosM::EditarEmpleadoM($datosC, $tablaBD);

        echo '	<input type="hidden" value="'.$respuesta["id"].'"  name="idE">

                <input type="text" placeholder="Nombre" value="'.$respuesta["nombre"].'" name="nombreE" required>

                <input type="text" placeholder="Apellido" value="'.$respuesta["apellido"].'" name="apellidoE" required>

                <input type="email" placeholder="Email" value="'.$respuesta["email"].'" name="emailE" required>

                <input type="text" placeholder="Puesto" value="'.$respuesta["puesto"].'" name="puestoE" required>

                <input type="text" placeholder="Salario" value="'.$respuesta["salario"].'" name="salarioE" required>

		        <input type="submit" value="Actualizar" class="btn btn-info">';
    }


    // Actualizar Empleado
    public function ActualizarEmpleadoC()
    {
        if (isset($_POST["nombreE"])) {
            $datosC = array("id"=>$_POST["idE"],
                            "nombre"=>$_POST["nombreE"],
                            "apellido"=>$_POST["apellidoE"],
                            "email"=>$_POST["emailE"],
                            "puesto"=>$_POST["puestoE"],
                            "salario"=>$_POST["salarioE"]);
            $tablaBD = "empleados";

            $respuesta = EmpleadosM::ActualizarEmpleadoM($datosC, $tablaBD);
        

            if ($respuesta == "Bien hecho") {
                header("location:index.php?ruta=empleados");
            } else {
                echo "error";
            }
        }
    }

    // Eliminar Empleado
    public function BorrarEmpleadoC(){

        if(isset($_GET["idB"])){
            // si la variable idB viene con información

            $datosC = $_GET["idB"];

            $tablaBD = "empleados";

            // Pedimos una respuesta al modelo
             $respuesta = EmpleadosM::BorrarEmpleadoM($datosC, $tablaBD);

            if ($respuesta == "Bien hecho") {
                header("location:index.php?ruta=empleados");
            } else {
                echo "error";
            }


        }
    }
}
