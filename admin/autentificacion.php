<?php
// Iniciar una nueva sesión o reanudar la existente
session_start();

// Supongamos que estos son tus credenciales de inicio de sesión
    $usuario_correcto = "BrunoPeruano";
    $contraseña_correcta = "q6^hki0Q<{7X1xdRa";
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
?>
