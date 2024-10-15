<?php
$servername = "localhost:3306";
$database = "ejemplo";
$username = "usuarioEj";
$password = "3ejemplo";
// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);
// Comprobar conexión
if (! $conn) {
    die("No se pudo conectar: " . mysqli_connect_error());
}
echo "Conexión OK \n\n\n";

$sql = "SELECT * from alumnos";

$result = $conn->query($sql);

$filas = array();
if (mysqli_num_rows($result) > 0) {
    while ($fila = mysqli_fetch_assoc($result)) {
        $filas[] = $fila;
    }
} else {
    die("Error: No hay datos en la tabla seleccionada");
}
$jsonInfo = json_encode($filas, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

$bytes = file_put_contents("alumnos.json", $jsonInfo);

if ($bytes != null) {
    echo 'Archivo guardado';
} else {
    echo 'No se pudo guardar información en el achivo';
}

// Cerrar conexión
mysqli_close($conn);
?>