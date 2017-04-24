<?php
include_once ("conexion.php");
$id_book = $_REQUEST['book'];
$sql = "DELETE FROM books WHERE id = $id_book";
if (mysql_query($sql, $db)) {
    header("location:lista.php");
}
mysql_close($db);
?>