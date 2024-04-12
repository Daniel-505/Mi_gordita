<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $message = $_POST["message"];
    $photo_name = $_FILES["photo"]["name"];
    $photo_tmp = $_FILES["photo"]["tmp_name"];

    // Guardar la foto en una carpeta específica
    $upload_folder = "\Imagenes";
    $target_photo = $upload_folder . basename($photo_name);

    if (move_uploaded_file($photo_tmp, $target_photo)) {
        // Guardar la foto en el servidor
        // Tu código para guardar la información de la publicación en una base de datos o donde quieras
        echo "La foto ha sido subida correctamente.";
    } else {
        echo "Hubo un error al subir la foto.";
    }
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
}
?>
