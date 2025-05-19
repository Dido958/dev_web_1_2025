<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
$pessoas = [
    "123.456.789-00" => [
        "nome" => "João Silva",
        "data_nascimento" => "1990-01-15"
    ],
    "987.654.321-11" => [
        "nome" => "Maria Oliveira",
        "data_nascimento" => "1985-06-23"
    ],
    "111.222.333-44" => [
        "nome" => "Carlos Souza",
        "data_nascimento" => "1979-09-12"
    ],
    "555.666.777-88" => [
        "nome" => "Ana Lima",
        "data_nascimento" => "1992-03-30"
    ],
    "999.888.777-66" => [
        "nome" => "Fernanda Costa",
        "data_nascimento" => "2000-12-05"
    ],
    "321.654.987-22" => [
        "nome" => "Paulo Mendes",
        "data_nascimento" => "1988-07-19"
    ],
    "444.333.222-11" => [
        "nome" => "Juliana Rocha",
        "data_nascimento" => "1995-11-11"
    ],
    "777.888.999-00" => [
        "nome" => "Marcos Teixeira",
        "data_nascimento" => "1975-04-07"
    ],
    "222.111.000-33" => [
        "nome" => "Bruna Ferreira",
        "data_nascimento" => "1993-10-28"
    ],
    "666.555.444-33" => [
        "nome" => "Lucas Martins",
        "data_nascimento" => "1982-08-02"
    ]
];
?>
<table>
    <tr>
        <th>CPF</th>
        <th>Nome</th>
        <th>Nascimento</th>
    </tr>
<?php
foreach ($pessoas as $cpf => $dados) {
    echo "<tr><td>".$cpf."</td><td>".$dados["nome"]."</td><td>".$dados["data_nascimento"]."</td></tr>"; 
    //echo "Nome: {$dados['nome']}<br>";
    //echo "Data de Nascimento: {$dados['data_nascimento']}<br><br>";
}
?>
</table>
</body>
</html>