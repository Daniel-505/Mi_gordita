<?php
// subir_publicacion.php

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si el mensaje no está vacío
    if (!empty($_POST["message"])) {
        // Almacenar el mensaje en la base de datos (debes implementar tu propia conexión a la base de datos)
        $mensaje = $_POST["message"];
        // Procesar la carga de la foto si es necesario

        // Para propósitos de demostración, supongamos que tienes una conexión MySQL
        $servidor = "localhost";
        $usuario = "Dani7788";
        $contrasena = "MCPE1234";
        $basedatos = "gordos";

        // Crear conexión
        $conexion = new mysqli("localhost", "Dani7788", "MCPE1234", "gordos");


// Verificar si la conexión falló
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consulta para obtener publicaciones
$sql = "SELECT * FROM publicaciones";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    // Mostrar los datos de cada fila
    while ($fila = $resultado->fetch_assoc()) {
        echo "<div>";
        echo "<p>" . $fila["mensaje"] . "</p>";
        // Agregar botón de eliminar con evento onclick
        echo '<button class="delete-button" onclick="eliminarPublicacion(' . $fila["id"] . ')">Eliminar</button>';
        echo "</div>";
    }
} else {
    echo "No se encontraron publicaciones";
}

// Cerrar conexión
$conexion->close();
?>
