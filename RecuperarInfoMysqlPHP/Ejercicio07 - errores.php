<?php
$servername = "localhost:3306";
$database = "ejemplo";
$username = "usuarioEj";
$password = "3ejemplo";
// Crear conexión

//Equivocar contraseña para provocar error de conexión
try {
    $conn = mysqli_connect($servername, $username, $password, $database);
} catch (Exception $e) {
    echo "ERROR: ".mysqli_connect_error()."\n";
    echo "Num: ".mysqli_connect_errno()."\n";
    die("No se pudo conectar");
}
// Comprobar conexión
echo "Conexión OK \n\n\n";
$conn->autocommit(false);

$conn->begin_transaction(MYSQLI_TRANS_START_READ_WRITE);


//Equivocar DNI para provocar error de inserción
try {
    if (! $conn->query("insert into asignaturas values (10,'Matemáticas')")) {
        throw new Exception("error al insertar la asignatura");
    }
    if (! $conn->query("insert into notas (dni,cod,nota) values('44345',10,10)")) {
        throw new Exception("error al insertar la nota");
    }
    $conn->commit();
    echo "Insertada la asignatura 10 y la nota.";
} catch (Exception $e) {
    echo "ERROR: ".mysqli_error($conn)."\n";
    echo "Num: ".mysqli_errno($conn)."\n";
    echo "Se deshace la operación, se ha producido un error.";
    echo "Mensaje: " . $e->getMessage();
    $conn->rollback();
}
// Cerrar conexión
mysqli_close($conn);
?>