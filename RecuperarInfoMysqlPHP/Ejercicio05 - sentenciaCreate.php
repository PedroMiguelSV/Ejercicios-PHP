<?php
$servername = "localhost:3306";
$database = "ejemplo";
$username = "usuarioEj";
$password = "3ejemplo";
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);
// Comprobar conexión
if (!$conn) {
    die("No se pudo conectar: " . mysqli_connect_error());
}
echo "Conexión OK \n\n\n";

$sql = "create view boletinnotas  AS select `alumnos`.`APENOM` AS `nombre`,`asignaturas`.`NOMBRE` AS `asignatura`,`notas`.`NOTA` AS `nota` from notas,asignaturas,alumnos where ((`notas`.`DNI` = `alumnos`.`DNI`) and (`notas`.`COD` = `asignaturas`.`COD`))";

if ($conn->query($sql) === TRUE) {
    echo "Vista creada correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Cerrar conexión
mysqli_close($conn);
?>