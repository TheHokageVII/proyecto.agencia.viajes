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

// Consultar datos de la tabla HOTEL
$sql = "SELECT * FROM hotel";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Registro de Hoteles</title>
</head>
<body>
    <h2>Hoteles Registrados</h2>
    <?php
    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Nombre</th><th>Ubicación</th><th>Habitaciones Disponibles</th><th>Tarifa por Noche</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id_hotel"]. "</td><td>" . $row["nombre"]. "</td><td>" . $row["ubicación"]. "</td><td>" . $row["habitaciones_disponibles"]. "</td><td>" . $row["tarifa_noche"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "No hay hoteles registrados";
    }
    ?>
</body>
</html>

<?php
$conn->close();
?>
