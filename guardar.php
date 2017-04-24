<?php
include_once ("conexion.php"); //nos conectamos a la base de datos
//REALIZAR CONSULTA
$sql = "INSERT INTO books (title, author, editorial)VALUES "
    . "('".$_POST['title']."','".$_POST['author']."','".$_POST['editorial']."')";
if (mysql_query($sql, $db)) {
    header("location:registro.php");
}
mysql_close($db);
?>