<?php
$servername = "localhost:3306";
$database = "ejemplo";
$username = "usuarioEj";
$password = "3ejemplo";
$valor="Madrid";


// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);
// Comprobar conexión
if (! $conn) {
    die("No se pudo conectar: " . mysqli_connect_error());
}
echo "Conexión OK \n\n\n";

$sql = "SELECT * from alumnos where POBLA = ?";

$miSentenciaPreparada=$conn->prepare($sql);

$miSentenciaPreparada->bind_param("s",$valor);


//SELECT * from alumnos where POBLA = 'Madrid'
$miSentenciaPreparada->execute();



$result = $miSentenciaPreparada->get_result();




if (mysqli_num_rows($result) > 0) {
    while ($fila = mysqli_fetch_assoc($result)) {
        echo $fila["APENOM"] . "\t";
        echo $fila["DIREC"] . "\t";
        echo $fila["POBLA"] . "\t";
        echo $fila["TELEF"] . "\t";
        echo $fila["FNAC"] . "\n";
    }
} else {
    die("Error: No hay datos en la tabla seleccionada");
}

// Cerrar conexión
mysqli_close($conn);
?>