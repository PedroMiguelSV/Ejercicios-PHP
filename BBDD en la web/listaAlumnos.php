<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Listado de Alumnos</title>
</head>

<body>
	<h1>Listado de Alumnos</h1>
	<ul>
	
<?php
include 'bd.php';

// Verifica si 'curso' está definido en $_POST antes de acceder a él
$curso = isset($_POST['curso']) ? $_POST['curso'] : "";

// Si 'curso' está vacío, se muestran todos los alumnos
if ($curso == "") {
    $result = listaAlumnos();
} else {
    $result = listaAlumnosPorCurso($curso);
}

// Verifica si hay resultados antes de iterar
if (mysqli_num_rows($result) > 0) {
    while ($fila = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo '<a href="detalleAlumno.php?dni=' . $fila["DNI"] . '">' . $fila["APENOM"] . "</a>\t";
        echo "</li>";
    }
} else {
    echo "<li>No hay datos en la tabla seleccionada</li>";
}
?>
	</ul>
	<a href="index.html">Volver</a>
</body>

</html>
