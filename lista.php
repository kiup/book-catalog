<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="list.css" rel="stylesheet" type="text/css">
    <meta charset="UTF-8">

    <script>
        function sortTable(number) {
            var table, rows, switching, i, x, y, shouldSwitch;
            table = document.getElementById("list");
            switching = true;
            while (switching) {
                switching = false;
                rows = table.getElementsByTagName("tr");
                for (i = 1; i < (rows.length - 1); i++) {
                    shouldSwitch = false;
                    x = rows[i].getElementsByTagName("td")[number];
                    y = rows[i + 1].getElementsByTagName("td")[number];
                    //check if the two rows should switch place:
                    if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                        shouldSwitch= true;
                        break;
                    }
                }
                if (shouldSwitch) {
                    rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
                    switching = true;
                }
            }

            if(number==1){ document.all.order.innerText = "id";}
            if(number==2){ document.all.order.innerHTML = 't&iacute;tulo';}
            if(number==3){ document.all.order.innerText = 'autor';}
            if(number==4){ document.all.order.innerText = "editorial";}
        }
    </script>

</head>
<body>
    <div id="section">
        <h3>Lista de libros por <span id="order" class="order">ID</span></h3>
        <table class="list" id="list">
            <thead class="head-table" id="head-table">
            <td class="not-printed">Eliminar</td>
            <td onclick="sortTable(1)" class = not-printed>ID</td>
            <td onclick="sortTable(2)">T&iacute;tulo</td>
            <td onclick="sortTable(3)">Autor</td>
            <td onclick="sortTable(4)">Editorial</td>

            </thead>
            <tbody class="body-table" id="body-table">
            <?php
            include ("conexion.php");
            $sql = "SELECT * FROM books";
            $result = mysql_query($sql, $db);
            mysql_close($db);
            $i = 0;
            while ($row = mysql_fetch_row($result)){
                $title = $i+1; $author=$i+2; $editorial=$i+3;
                echo "
                <tr>
                    <td class=\"not-printed\"><i class=\"fa fa-minus-square\" onclick=\"location='eliminar.php?book=$row[$i]'\"></i></td>
                    <td class=\"not-printed\">$row[$i]</td>
                    <td>$row[$title]</td>
                    <td>$row[$author]</td>
                    <td>$row[$editorial]</td>
                </tr>
            ";
            }
            ?>
            </tbody>
        </table>
    </div>
    <div id="button">
        <button id="regresar" onclick="location='registro.php'">Regresar</button>
        <button id="print" onclick="print()">Imprimir cat&aacute;logo</button>
    </div>
</body>
</html>