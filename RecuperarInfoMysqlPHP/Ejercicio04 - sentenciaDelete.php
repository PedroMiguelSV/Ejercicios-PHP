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

$sql = "DELETE FROM NOTAS where cod=9 and dni='56882942'";

if ($conn->query($sql) === TRUE) {
    echo "Nota eliminada correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
// Cerrar conexión
mysqli_close($conn);
?>