<?php
require '../login/conexion_be.php';
// Obtener hora
$hora = date ('H');
if ($hora >= 8 && $hora < 12) {
    $saludo = 'Buenos dias';
}elseif ($hora >=12 && $hora < 20) {
    $saludo = "Buenas tardes";
}else{
    $saludo = "Buenas noches";
}
?>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herramientas de administrador</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
    <body>
        <!-- NAVEGADOR -->
        <div class="nav">
            <!-- SALUDO -->
            <div class="nav__saludo">
                <p class="saludo__bienvenida">
                    <?php 
                    echo "$saludo"; 
                    ?>
                </P>
            </div>
            <!-- MENU -->
            <div class="nav__menu">
                <ul class="menu__indice">
                    <a href="../pages/bienvenido.php" class="indice__partes"><li class="indice__partes">Inicio</li> </a> 
                    <a href="../pages/actividades.php" class="indice__partes"><li class="indice__partes">Actividades</li></a> 
                    <a href="../pages/noticias.php" class="indice__partes"><li class="indice__partes">Noticias</li> </a> 
                <!-- ADMINISTRADORES -->
                    <li class="indice__partes__admin">Administrador</li></a>
                </ul>
            </div>
            <!-- CERRAR SESION -->
            <a href="../login/logout.php" class="nav__logout">
                <div>
                    <p class="logout__text">Cerrar Sesión</p>
                </div>
            </a>
        </div>
        <!-- CONTENIDO -->
        <div class="main">
        <table border="1">
                <tr>
                    <td>Nombre del trabajador</td>
                    <td>Activo</td>
                    <td> Editar usuario </td>
                    <td> Borrar usuario </td>
                </tr>   
                <?php
                $sql="SELECT * from trabajadores"; $result=mysqli_query($conexion, $sql);
                while($mostrar=mysqli_fetch_array($result)){
                    ?>
                <tr>
                    <td><?php echo $mostrar['nombre'] ?></td> 
                    <td><?php echo $mostrar['estado'] ?></td>
                    <td class="campo__iconos"><a href="./editar_trabajador.php?id= <?= $mostrar['id'] ?>"><img class="icono" src="../imagenes/icono_editar.png"></a></td>
                    <td class="campo__iconos"><a href="../login/delete_trabajador.php?id= <?= $mostrar['id'] ?>"><img class="icono" src="../imagenes/icono_borrar.png" alt="Eliminar"></a></td> 
                </tr>
                <?php
                }
                ?>
            </table>
    </body>
</html>