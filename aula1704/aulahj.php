<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body> 
    <h2>Envio</h2>
    <form action="" method="get">
        <input type="number" name="linha">
        <br><br>
        <input type="number" name="colum">    
        <br><br>
        <button type="submit">enviar</button>
    </form>
    <?php
    $linhas = $_GET["linha"];
    $colunas = $_GET["colum"];
    $i=0;
    $j=0;
    echo "<table>";
    for($i=0;$i<$linhas; $i++){
        echo "<tr>";
        for ($j=0;$j<$colunas;$j++ ) {
            echo"<td>L" . $i + 1 . "C" . $j + 1 . "</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
    ?>
</body>
</html>