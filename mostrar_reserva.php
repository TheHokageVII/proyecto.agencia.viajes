<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "SELECT h.nombre, h.ubicacion, COUNT(r.id_reserva) as num_reservas 
        FROM HOTEL h 
        JOIN RESERVA r ON h.id_hotel = r.id_hotel 
        GROUP BY h.id_hotel 
        HAVING num_reservas > 2";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table border='1'>
            <tr>
                <th>Nombre del Hotel</th>
                <th>Ubicación</th>
                <th>Número de Reservas</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["nombre"]."</td>
                <td>".$row["ubicacion"]."</td>
                <td>".$row["num_reservas"]."</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron hoteles con más de dos reservas.";
}

$conn->close();
?>
