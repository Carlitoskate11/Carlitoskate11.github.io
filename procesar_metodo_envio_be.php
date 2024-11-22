<?php
session_start();
include 'conexion_be.php';

if (!isset($_SESSION['id_usuario'])) {
    die("Acceso no autorizado.");
}

// Usar el ID del usuario en la sesión
$id_usuario = $_SESSION['id_usuario'];

// Capturar datos del formulario
$metodo_seleccionado = $_POST['selected_method']; // Del input hidden
$cantidad = 1; // Ajustar según la lógica de tu sistema
$envio_incluido = 1; // Puedes ajustar este valor según tu lógica
$subtotal = 78.00; // Sustituir por el subtotal real si varía

// Validar campos requeridos
if (empty($metodo_seleccionado)) {
    die("Por favor, selecciona un método de envío.");
}

// Insertar datos en la tabla de método de envío
$sql = "INSERT INTO metodos_envio (id_usuario, metodo_seleccionado, cantidad, envio_incluido, subtotal)
        VALUES ('$id_usuario', '$metodo_seleccionado', '$cantidad', '$envio_incluido', '$subtotal')";

if (mysqli_query($conexion, $sql)) {
    echo "Método de envío guardado correctamente.";
    header("Location: principal.php"); // Redirigir a la página principal o de confirmación
    exit();
} else {
    echo "Error al guardar el método de envío: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>