<?php
// Iniciar una nueva sesión o reanudar la existente
session_start();
include("conexion.php");
$query = "SELECT * FROM usuario where id = 1";
$resultado = mysqli_query($conn, $query);
while ($row = $resultado->fetch_assoc()) {
    $user = $row;
}
// Supongamos que estos son tus credenciales de inicio de sesión
if (!empty($user)) {
    $usuario_correcto = $user["usuario"];
    $contraseña_correcta = $user["contraseña"];
} else {
    $usuario_correcto = "";
    $contraseña_correcta = "";
}
$captcha = $_POST["captcha"];
$captcha = $_POST["g-recaptcha-response"];

// Verificar la respuesta del reCAPTCHA
$secretKey = "6LchDFMpAAAAACHgTyH3uphxdrrPVCQhHnQPetZL";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
$responseKeys = json_decode($response, true);



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    if ($usuario == $usuario_correcto && $contraseña == $contraseña_correcta && intval($responseKeys["success"]) === 1) {
        // Inicio de sesión exitoso, establecer variable de sesión y redirigir
        $_SESSION["usuario"] = $usuario;
        header('Location: ../admin.php');
        exit;
    } else {
        header('Location: ../sesion.php');
        // Inicio de sesión fallido
        echo "Usuario o contraseña incorrectos.";
    }
}
