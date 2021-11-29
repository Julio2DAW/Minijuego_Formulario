<!DOCTYPE html>
<!--Julio Antonio Ramos Gago-->
<?php
    require 'configbd.php'; //Acceso a la base de datos.
    $conectar = new mysqli(HOSTNAME, USERNAME, PW, DB);
?>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" / >
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pagina Principal</title>
</head>
<body>
    <form action="formulario.php" method="post">
        <!--ID del minijuego-->
        <label for="idMinijuego">Nº del Minijuego</label>
        <input type="number" name="idMinijuego" id="idMinijuego" /><br />
        <!--Nombre del jugador-->
        <label for="nick">Nick: </label>
        <input type="text" name="nick" id="nick" /><br />
        <!--Puntuación de la partida-->
        <label for="puntuacion">Puntuación: </label>
        <input type="number" name="puntuacion" id="puntuacion" /><br />
        <!--Agregar la puntuación a la base de datos-->
        <input type="submit" value="Agregar">
        <!--Eliminar datos del formulario-->
        <input type="reset" value="Borrar">
    </form>
    <!--Volver a la página de inicio (menú)-->
    <a href="index.html">Volver al inicio</a>
    <?php
        if($_POST){
        //Consulta
        $consulta="INSERT INTO partida (idMinijuego, nick, puntuacion) VALUES ('".$_POST['idMinijuego']."', '".ucwords($_POST['nick'])."', '".$_POST['puntuacion']."');";
        $resultado=$conectar->query($consulta);
        echo '<p>Partida agregado correctamente</p>';
        }
    ?>
</body>
</html>