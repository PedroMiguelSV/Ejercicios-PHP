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

$sql = "SELECT sysdate()";
$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // para cada fila obtenida
    while($row = $result->fetch_assoc()) {
         echo $row['sysdate()']."\n";
//          $postdate = date('d M Y', strtotime($row['sysdate()']));
//          echo $postdate;
    }
} else {
    echo "0 resultados";
}

// Cerrar conexión
mysqli_close($conn);
?>