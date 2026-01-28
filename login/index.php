<?php
/* Base de datos */
$servidor = "localhost";
$usuario = "root";
$contrasena = ""; 
$basededatos = "biblioteca";

/* Conectarse a la base de datos */ 
$conn = new mysqli($servidor, $usuario, $contrasena, $basededatos);

/* Validar la conexion conexión */
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$sql = "INSERT INTO usuarios (nombre, admin, correo, contrasena) 
/*  Introducir valores del usuario*/ 
/***********************************************************/
VALUES ('oscar', 0, 'oscar@gmail.com', 'talavera')";
/***********************************************************/

/* Usuario creado con exito */
if ($conn->query($sql) === TRUE) {
    echo " registrado con éxito. <a href='registro.php'>Volver</a>";
} 
/* Error en la base de datos */
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
