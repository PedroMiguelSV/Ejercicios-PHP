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

$sql = "INSERT INTO Alumnos (dni,apenom,direc,pobla,telef,curso) VALUES (?, ?, ?,?,?,?)";
$stmt = $conn->prepare($sql);

$alumno_json = file_get_contents('insertAlumno.json');
$alumno_decoded = json_decode($alumno_json, false);
$stmt->bind_param("sssssi", 
        $alumno_decoded->DNI, 
        $alumno_decoded->APENOM, 
        $alumno_decoded->DIREC, 
        $alumno_decoded->POBLA, 
        $alumno_decoded->TELEF, 
        $alumno_decoded->CURSO);

$stmt->execute();
echo 'Creado el registro';

// Cerrar conexión
mysqli_close($conn);
?>