<?php
// Conexión a la base de datos
$servername = "localhost";
$dbname = "mi-gordita";

// Crear conexión
$conn = new mysqli($servername, "", "", $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"];
    $photo_name = $_FILES["photo"]["name"];
    $photo_tmp = $_FILES["photo"]["tmp_name"];

    // Guardar la foto en una carpeta específica
    $upload_folder = "Imagenes/";
    $target_photo = $upload_folder . basename($photo_name);

    if (move_uploaded_file($photo_tmp, $target_photo)) {
        // Guardar la información de la publicación en la base de datos
        $sql = "INSERT INTO publicaciones (mensaje, foto) VALUES ('$message', '$target_photo')";
        
        if ($conn->query($sql) === TRUE) {
            echo "La publicación ha sido guardada correctamente.";
        } else {
            echo "Error al guardar la publicación: " . $conn->error;
        }
    } else {
        echo "Hubo un error al subir la foto.";
    }
}

// Cerrar conexión
$conn->close();
?>
