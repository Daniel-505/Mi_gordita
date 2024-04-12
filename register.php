<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir datos del formulario
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Generar un código de confirmación (puedes usar alguna librería para esto)
    $confirmationCode = generateConfirmationCode();

    // Guardar el código de confirmación en una base de datos o en algún lugar seguro

    // Envío de correo electrónico con el código de confirmación
    $to = $email;
    $subject = "Confirmación de registro";
    $message = "¡Gracias por registrarte en nuestro sitio! Tu código de confirmación es: $confirmationCode";
    $headers = "From: your-email@example.com"; // Cambiar por tu dirección de correo electrónico

    // Enviar correo electrónico
    if (mail($to, $subject, $message, $headers)) {
        echo "Se ha enviado un correo electrónico de confirmación a $email. Por favor, revisa tu bandeja de entrada.";
    } else {
        echo "Hubo un problema al enviar el correo electrónico de confirmación. Por favor, intenta registrarte nuevamente más tarde.";
    }
}

function generateConfirmationCode() {
    // Genera un código de confirmación aleatorio (puedes implementar tu propia lógica aquí)
    return substr(md5(uniqid(rand(), true)), 0, 6); // Código de 6 caracteres
}
?>
