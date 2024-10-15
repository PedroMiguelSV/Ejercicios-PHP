<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<title>Lista notas</title>
</head>

<body>
	<h1>Notas de la asignatura </h1>
	<ul>
	
<?php
include 'bd.php';
$cod = $_GET['cod'];
$result = verNotas($cod);
if (mysqli_num_rows($result) > 0) {
    while ($fila = mysqli_fetch_assoc($result)) {
        echo "<li>";
        echo $fila["COD"] . "\t";
        echo $fila["ASIGNATURA"] . "\t";
        echo $fila["ALUMNO"] . "\t";
        echo $fila["NOTA"] . "\n";
        echo "</li>";
    }
} else {
    die("No hay datos en la asignatura");
}
?>
	</ul>
	<a href="listaAsignaturas.php">Volver a lista de asignaturas</a>
</body>

</html>
