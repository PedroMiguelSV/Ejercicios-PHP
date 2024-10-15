<?php
$servername = "localhost:3306";
$database = "ejemplo";
$username = "usuarioEj";
$password = "3ejemplo";
// Crear conexión

$conn=null;
try {
    $conn = mysqli_connect($servername, $username, $password, $database);
} catch (Exception $e) {
    echo "No se pudo conectar: " . $e;
}


// Comprobar conexión
if (! $conn) {
    die("No se pudo conectar: " . mysqli_connect_error());
} else {
    echo "Conexión OK \n";
    // Cerrar conexión
    mysqli_close($conn);
}
?>