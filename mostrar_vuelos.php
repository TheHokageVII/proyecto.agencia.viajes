<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar datos de la tabla VUELO
$sql = "SELECT * FROM vuelo";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Vuelos Registrados</title>
</head>
<body>
    <h2>Vuelos Registrados</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Origen</th><th>Destino</th><th>Fecha</th><th>Plazas Disponibles</th><th>Precio</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id_vuelo"]. "</td><td>" . $row["origen"]. "</td><td>" . $row["destino"]. "</td><td>" . $row["fecha"]. "</td><td>" . $row["plazas_disponibles"]. "</td><td>" . $row["precio"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay vuelos registrados";
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
