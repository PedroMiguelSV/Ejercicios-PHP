<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Detalle de Alumnos</title>
</head>

<body>
	<h1>Ficha del Alumno</h1>
	<ul>
	
<?php
include 'bd.php';
$dni = $_GET['dni'];
$result = detalleAlumno($dni);
if (mysqli_num_rows($result) > 0) {
    while ($fila = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo $fila["APENOM"] . "\t";
        echo $fila["DIREC"] . "\t";
        echo $fila["POBLA"] . "\t";
        echo $fila["TELEF"] . "\t";
        echo $fila["FNAC"] . "\n";
        echo "</li>";
    }
} else {
    die("Error: No hay datos en la tabla seleccionada");
}
?>
	</ul>
	<a href="listaAlumnos.php">Volver a lista de alumnos</a>
</body>

</html>
