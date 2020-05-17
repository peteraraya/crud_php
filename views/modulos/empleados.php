<?php
// Para mantener privadas nuestras rutas

session_start();

if (!$_SESSION["Ingreso"]) {
    header("location:index.php?ruta=ingreso");

    exit();
}

?>


	<h1 class="mt-3">Empleados</h1>

	<table id="t1"  class="table table-hover shadow">
		
		<thead class="bg-primary text-light text-center">
			
			<tr>
				<th>Nombre</th>
				<th>Apellido</th>
				<th>Email</th>
				<th>Puesto</th>
				<th>Salario</th>
				<th></th>
				<th></th>

			</tr>

		</thead>

		<tbody class="shadow">
			
			<?php
                $mostrar = new EmpleadosC();
                $mostrar -> MostrarEmpleadosC();
            ?>
		</tbody>

	</table>


<?php

$eliminar = new EmpleadosC();
$eliminar -> BorrarEmpleadoC();
