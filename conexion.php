<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$db = mysql_connect($servidor, $usuario, $contrasena);

if (mysql_select_db("catalogo",$db)) {
    //header("location:registro.php?result=0");
}
?>