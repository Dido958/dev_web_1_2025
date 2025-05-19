<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    //var_dump($_GET);
    $a=$_GET["a"];
    $b=$_GET["b"];
    $op=$_GET["op"];
    $result=0;
    //echo "O resultado é: ". $a+$b;
    //if($a==""|| $b=="")
    //{
    //    die("Dados inválidos");
    //}
    //echo "O resultado é: ". $a+$b;
    if($op=="Adição"){
        $result=$a+$b;
    }
    elseif($op=="Subtração"){
        $result=$a-$b;
    }
    elseif($op=="Multiplicação"){
        $result=$a*$b;
    }
    elseif($op=="Divisão"){
        $result=$a/$b;
    }
    echo $result;
    ?>
</body>
</html>
