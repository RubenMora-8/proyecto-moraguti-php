<?php
// Conexion a la base de datos
    include 'conexion_be.php';

// Valores que queremos almacenar
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];

// Validar
    $validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo ='$correo' AND contrasena ='$contrasena'");

// Comprobar que existen credenciales
    if (mysqli_num_rows($validar_login) > 0){

// Dirigir a la pagina web
        header("location: ../pages/bienvenido.php");
        exit;
    }echo 'Comprueba que los datos sean validos';
    exit;
?>