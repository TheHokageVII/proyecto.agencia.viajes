<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT h.nombre, h.ubicación, COUNT(r.id_reserva) AS num_reservas
       JOIN reserva r ON h.id_hotel = r.id_hotel
           FROM hotel h
      GROUP BY h.id_hotel
        ORDER BY num_reservas DESC
        LIMIT 1";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "Nombre del Hotel: " . $row["nombre"]. " - Ubicación: " . $row["ubicación"]. " - Número de Reservas: " . $row["num_reservas"]. "<br>";
    }
} else {
    echo "No se encontraron reservas.";
}

$conn->close();
?>