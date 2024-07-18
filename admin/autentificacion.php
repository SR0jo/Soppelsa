<?php
ini_set ('display_errors', 1); 
ini_set ('display_startup_errors', 1); 
error_reporting (E_ALL); 

// Iniciar una nueva sesión o reanudar la existente
session_start();
include("conexion.php");
$query = "SELECT * FROM usuario where id = 1";
$resultado = mysqli_query($conn, $query);
while ($row = $resultado->fetch_assoc()) {
    $user = $row;
}

if (!empty($user)) {
    $usuario_correcto = $user["usuario"];
    $contraseña_correcta = $user["contraseña"]; // Asumiendo que esta es la contraseña hash
} else {
    $usuario_correcto = "";
    $contraseña_correcta = "";
}

$captcha = $_POST["g-recaptcha-response"];

// Verificar la respuesta del reCAPTCHA
$secretKey = "6LchDFMpAAAAACHgTyH3uphxdrrPVCQhHnQPetZL";
$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$captcha");
$responseKeys = json_decode($response, true);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST["usuario"];
    $contraseña = $_POST["contraseña"];

    if ($usuario != $usuario_correcto) {
        header('Location: /Pages/Login/');
        echo "Usuario incorrecto.\n";
    } elseif (!password_verify($contraseña, $contraseña_correcta)) {
        header('Location: /Pages/Login/');
        echo "Contraseña incorrecta.\n";
    } elseif (intval($responseKeys["success"]) !== 1) {
        header('Location: /Pages/Login/');
        echo "Captcha no validado.\n";
    } else {
        // Inicio de sesión exitoso, establecer variable de sesión y redirigir
        $_SESSION["usuario"] = $usuario;
        header('Location: admin.php');
        exit;
    }
}
?>
