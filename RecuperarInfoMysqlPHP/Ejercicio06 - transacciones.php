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
$conn->autocommit(false);

$conn->begin_transaction();

try {
    if (! $conn->query("insert into asignaturas values (10,'Matemáticas')")) {
        throw new Exception("error al insertar la asignatura");
    }
    if (! $conn->query("insert into notas (dni,cod,nota) values('12344345',10,10)")) {
        throw new Exception("error al insertar la nota");
    }
    echo "hola";
    $conn->commit();
    echo "Insertada la asignatura 10 y la nota.";
} catch (Exception $e) {
    echo "Se deshace la operación, se ha producido un error.";
    echo "Mensaje: ". $e->getMessage();
    $conn->rollback();
}
// Cerrar conexión
mysqli_close($conn);
?>