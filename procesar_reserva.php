<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "AGENCIA";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión Fallida: " . $conn->connect_error);
}

    $id_cliente = $_POST['id_cliente'];
    $fecha_reserva = $_POST['fecha_reserva'];
    $id_vuelo = $_POST['id_vuelo'];
    $id_hotel = $_POST['id_hotel'];

    if (empty($id_cliente) || empty($fecha_reserva) || empty($id_vuelo) || empty($id_hotel)) {
        die("Todos los campos deben ser completados.");
    }

    $sql = "INSERT INTO RESERVA (id_cliente, fecha_reserva, id_vuelo, id_hotel) VALUES ('$id_cliente', '$fecha_reserva', '$id_vuelo', '$id_hotel')";

    if ($conn->query($sql) === TRUE) {
        echo "Nueva reserva creada con éxito";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

$conn->close();
?>