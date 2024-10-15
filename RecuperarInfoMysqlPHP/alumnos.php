<?php
$servername = "localhost:3306";
$database = "ejemplo";
$username = "usuarioEj";
$password = "3jemplo";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully \n";

$sql = "SELECT dni,apenom,fnac FROM alumnos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//         $textoJSON.= json_encode($row);
//         $texto.=serialize($row);
        echo "dni: " . $row["dni"]. " - Apenom: " . $row["apenom"]. " " . $row["fnac"]. "\n";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);
?>