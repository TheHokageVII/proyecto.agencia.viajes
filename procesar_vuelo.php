<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$origen = $_POST['origen'];
$destino = $_POST['destino'];
$fecha = $_POST['fecha'];
$plazas_disponibles = $_POST['plazas_disponibles'];
$precio = $_POST['precio'];

if (empty($origen) || empty($destino) || empty($fecha) || empty($plazas_disponibles) || empty($precio)) {
    die("Todos los campos deben ser completados.");
}

$sql = "INSERT INTO vuelo (origen, destino, fecha, plazas_disponibles, precio) VALUES ('$origen', '$destino', '$fecha', '$plazas_disponibles', '$precio')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo vuelo registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>