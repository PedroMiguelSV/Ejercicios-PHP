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
echo "Conexión OK \n";

$sql = "SELECT * from alumnos";

$stmt = $conn->prepare($sql);

$result = $stmt->result_metadata();


var_dump($result->fetch_fields());



// Cerrar conexión
mysqli_close($conn);
?>