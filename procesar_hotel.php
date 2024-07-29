<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$ubicacion = $_POST['ubicación'];  
$habitaciones_disponibles = $_POST['habitaciones_disponibles'];
$tarifa_noche = $_POST['tarifa_noche'];

if (empty($nombre) || empty($ubicacion) || empty($habitaciones_disponibles) || empty($tarifa_noche)) {
    die("Todos los campos deben ser completados.");
}

$sql = "INSERT INTO hotel (nombre, ubicación, habitaciones_disponibles, tarifa_noche) VALUES ('$nombre', '$ubicacion', '$habitaciones_disponibles', '$tarifa_noche')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo hotel registrado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>