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

$sql = "SELECT * from alumnos";

$stmt = $conn->prepare($sql);
$stmt->execute();


$metadatos = $stmt->result_metadata();


while ( $campo = $metadatos->fetch_field() ) {
//     echo var_dump($campo)."\n";
    echo "Name: ".$campo->name."\n";
    echo "orgname: ".$campo->orgname."\n";
    echo "table: ".$campo->table."\n";
    echo "orgtable: ".$campo->orgtable."\n";
    echo "def: ".$campo->def."\n";
    echo "db: ".$campo->db."\n";
    echo "catalog: ".$campo->catalog."\n";
    echo "max_length: ".$campo->max_length."\n";
    echo "length: ".$campo->length."\n";
    echo "charsetnr: ".$campo->charsetnr."\n";
    echo "flags: ".$campo->flags."\n";
    echo "type: ".$campo->type."\n";
    echo "decimals: ".$campo->decimals."\n";
    echo "---\n\n";
  
}


// Cerrar conexión
mysqli_close($conn);
?>