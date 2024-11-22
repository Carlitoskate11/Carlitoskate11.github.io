<?php
session_start();
include 'conexion_be.php';

if (!isset($_SESSION['id_usuario'])) {
    die("Acceso no autorizado.");
}

// Usar el ID del usuario en la sesión
$id_usuario = $_SESSION['id_usuario'];

// Capturar datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$direccion = $_POST['direccion'];
$departamento = $_POST['departamento'];
$municipio = $_POST['municipio'];
$indicaciones = isset($_POST['indicaciones']) ? $_POST['indicaciones'] : null;
$telefono = $_POST['telefono'];
$telefono_adicional = isset($_POST['telefono_adicional']) ? $_POST['telefono_adicional'] : null;
$nit = $_POST['nit'];
$guardar_datos = isset($_POST['guardar_datos']) ? 1 : 0;

// Validar campos requeridos
if (empty($nombre) || empty($apellido) || empty($direccion) || empty($departamento) || empty($municipio) || empty($telefono) || empty($nit)) {
    die("Por favor, complete todos los campos obligatorios.");
}

// Insertar datos en la tabla de envío
$sql = "INSERT INTO informacion_envio 
        (id_usuario, nombre, apellido, direccion, departamento, municipio, indicaciones, telefono, telefono_adicional, nit, guardar_datos)
        VALUES ('$id_usuario', '$nombre', '$apellido', '$direccion', '$departamento', '$municipio', '$indicaciones', '$telefono', '$telefono_adicional', '$nit', '$guardar_datos')";

if (mysqli_query($conexion, $sql)) {
    echo "Información de envío guardada correctamente.";
} else {
    echo "Error al guardar la información: " . mysqli_error($conexion);
}
mysqli_close($conexion);
?>