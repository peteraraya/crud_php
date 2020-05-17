<?php
// Para mantener privadas nuestras rutas

session_start();

if (!$_SESSION["Ingreso"]) {
    header("location:index.php?ruta=ingreso");

    exit();
}

?>

	<br>
	<h1>EDITAR UN EMPLEADO</h1>

	<form method="post">
		
	

        
	<?php

        $editar = new EmpleadosC();
        $editar -> EditaEmpleadoC();

        $actualizar = new EmpleadosC();
        $actualizar -> ActualizarEmpleadoC();

    ?>

	</form>


