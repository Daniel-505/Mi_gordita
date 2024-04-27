<?php
// obtener_publicaciones.php

// Obtener publicaciones de la base de datos y devolverlas como HTML
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
