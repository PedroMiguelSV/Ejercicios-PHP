<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Listado de Asignaturas</title>
</head>

<body>
	<h1>Listado de Asignaturas</h1>
	<ul>
	
<?php
include 'bd.php';
$result = listaAsignaturas();
if (mysqli_num_rows($result) > 0) {
    while ($fila = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo '<a href="notasAsignatura.php?cod='.$fila["COD"].'">'.$fila["NOMBRE"] . "</a>\t";
//         echo $fila["NOMBRE"] . "\t";
        echo "</li>";
    }
} else {
    die("Error: No hay datos en la tabla seleccionada");
}
?>
	</ul>

	<a href="index.html">Volver</a>
</body>

</html>
