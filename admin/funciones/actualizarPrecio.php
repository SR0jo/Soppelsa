<?php
include("../conexion.php");

// Recogida de datos del formulario
$fecha = $_POST['fecha'];
$hora = $_POST['hora'];
$porcentaje = $_POST['porcentaje'];

// Inserción en la base de datos
$sql = "INSERT INTO tabla (fecha, hora, porcentaje,actualizado) VALUES ('$fecha','$hora', $porcentaje, 0)";

if ($conn->query($sql) === TRUE) {
    echo "Datos insertados correctamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>