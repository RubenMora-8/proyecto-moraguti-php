<?php
require 'conexion_be.php';
// Datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = trim($_POST['correo']);
    $nueva_contrasena = trim($_POST['contrasena']);
    $confirmar_contrasena = trim($_POST['confirmar_contrasena']);

// Todos los campos son necesarios
    if (empty($correo) || empty($nueva_contrasena) || empty($confirmar_contrasena)) {
        echo "Todos los campos son obligatorios.";
        echo "<a href='../pages/restablecer.html'>Volver</a>";
        exit();
    }
// Las contraseñas tienen que ser las mismas
    if ($nueva_contrasena !== $confirmar_contrasena) {
        echo "Las contraseñas no coinciden.";
        echo "<a href='../pages/restablecer.html'>Volver</a>";
        exit();
    }

// Verificar si el correo existe en la base de datos
    $consulta = $conexion->prepare("SELECT contrasena FROM usuarios WHERE correo = ?");
    $consulta->bind_param("s", $correo);
    $consulta->execute();
    $resultado = $consulta->get_result();

// ¿El correo está registrado?
    if ($resultado->num_rows === 0) {
        echo "El correo no está registrado.";
        echo "<a href='../pages/restablecer.html'>Volver</a>";
        exit();
    }

// Contraseña sin encriptar 
  $password_hashed = $nueva_contrasena;

// Encriptar contraseña [ no se como se desencripta :( ]
// $password_hashed = password_hash($nueva_contrasena, PASSWORD_DEFAULT); 

// Actualizar contraseña
    $consulta = $conexion->prepare("UPDATE usuarios SET contrasena = ? WHERE correo = ?");
    $consulta->bind_param("ss", $password_hashed, $correo);

// ¿Se ejecuta todo bien?
    if ($consulta->execute()) {
        header("Location: ../index.html");
    } else {
        echo "Error al actualizar la contraseña.";
        echo "<a href='../pages/restablecer.html'>Volver</a>";
    }
    $consulta->close();
    $conexion->close();
}
?>
