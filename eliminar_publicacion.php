<?php
// eliminar_publicacion.php

// Verificar si el método de solicitud es POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se estableció el parámetro 'id'
    if (isset($_POST["id"])) {
        // Para propósitos de demostración, supongamos que tienes una conexión MySQL
        $servidor = "localhost";
        $usuario = "usuario";
        $contrasena = "contraseña";
        $basedatos = "tu_base_de_datos";

        // Crear conexión
        $conexion = new mysqli($servidor, $usuario, $contrasena, $basedatos);

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Conexión fallida: " . $conexion->connect_error);
        }

        // Preparar y enlazar la instrucción SQL
        $stmt = $conexion->prepare("DELETE FROM publicaciones WHERE id = ?");
        $stmt->bind_param("i", $_POST["id"]);

        // Ejecutar la instrucción SQL
        if ($stmt->execute() === TRUE) {
            echo "Publicación eliminada exitosamente";
        } else {
            echo "Error al eliminar la publicación: " . $conexion->error;
        }

        // Cerrar conexión
        $stmt->close();
        $conexion->close();
    } else {
        echo "No se proporcionó el ID de la publicación";
    }
}
?>
