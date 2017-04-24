<!DOCTYPE html>
<html lang="en">
<head>
    <link href="registro.css" type="text/css" rel="stylesheet">
    <meta charset="UTF-8">
    <script>
        function save(author, editorial){
            if(localStorage.length>0){
                var title = document.getElementById('title');
                var id_new = parseInt(localStorage.getItem("ID_TOTAL")) + 1;
                localStorage.setItem(id_new,[title.value,author,editorial]);
                console.log(title.value, author, editorial);
                localStorage.setItem("ID_TOTAL", id_new);
            }else{
                localStorage.setItem("ID_TOTAL", 0);
                localStorage.setItem(0, [title.value,author,editorial]);
            }
        }
    </script>
</head>
<body>

<form id="registry" name="forma" class="registry" action="guardar.php" method="post">
    <h3>Registro de lotes de libros</h3>
    <div id="book-data" class="formulario" name="data">
        <div class="field">
            <label for="title">T&iacute;tulo:</label>
            <input type="text" id="title" name="title" placeholder="t&iacute;tulo">
        </div>
        <div class="field">
            <label for="author">Autor:</label>
            <input type="text" id="author" name="author" placeholder="autor">
        </div>

        <div class="field">
            <label for="editorial">Editorial:</label>
            <input type="text" id="editorial" name="editorial" placeholder="editorial">
        </div>
        <div>
            <input type="submit" class="button" name="boton" id="registrar" value="Registrar" onclick="save(author.value, editorial.value)">
        </div>
        <div id="error"></div>
    </div>
</form>

<div><input type="button" class="button" name="go-list" value="Mostrar lista" onclick="location='lista.php'"></div>
</body>
</html>