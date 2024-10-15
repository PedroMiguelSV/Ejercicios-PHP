<?php

function conecta()
{
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
    return $conn;
}

function desconecta($conexion)
{

    // Cerrar conexión
    mysqli_close($conexion);
}

function listaAlumnosPorCurso($curso)
{
    $result="";
    $conexion = conecta();
     $sql = "SELECT * from alumnos where curso=?";
     
    $stmt = $conexion->prepare($sql);
    $stmt->bind_param("i", $curso);
    $stmt->execute();
    $result = $stmt->get_result();
    
    desconecta($conexion);
    return $result;
}
function listaAlumnos()
{
    $conexion = conecta();
    $sql = "SELECT * from alumnos";
    $result = $conexion->query($sql);
    
    desconecta($conexion);
    return $result;
}

function listaAsignaturas()
{
    $conexion = conecta();
    $sql = "SELECT * from asignaturas";

    $result = $conexion->query($sql);
    desconecta($conexion);
    return $result;
}

function detalleAlumno($dni)
{
    $conexion = conecta();
    $sql = "SELECT * from alumnos where dni =?";
    $stmt = $conexion->prepare($sql);

    $stmt->bind_param("s", $dni);

    $stmt->execute();
    $result = $stmt->get_result();
    desconecta($conexion);
    return $result;
}

function verNotas($asignatura)
{
    $conexion = conecta();
    $sql = "SELECT asignaturas.cod COD, asignaturas.nombre  ASIGNATURA, nota NOTA, alumnos.apenom ALUMNO  from notas,asignaturas,alumnos where notas.cod=asignaturas.cod and notas.dni=alumnos.dni and notas.cod =?";
   
    $stmt = $conexion->prepare($sql);

    $stmt->bind_param("i", $asignatura);

    $stmt->execute();
    $result = $stmt->get_result();
    desconecta($conexion);
    return $result;
}

?>