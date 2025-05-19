<?php

$cidades = [
    1100205 => [
        "nome" => "Porto Velho",
        "habitantes" => 539354,
        "pib" => 17112978 // PIB em R$
    ],
    5208707 => [
        "nome" => "Goiânia",
        "habitantes" => 1536097,
        "pib" => 215243129 // PIB em R$
    ],
    3304557 => [
        "nome" => "Rio de Janeiro",
        "habitantes" => 6747815,
        "pib" => 6930000000 // PIB em R$
    ],
    3550308 => [
        "nome" => "São Paulo",
        "habitantes" => 12325232,
        "pib" => 71900000000 // PIB em R$
    ],
    4205407 => [
        "nome" => "Florianópolis",
        "habitantes" => 508826,
        "pib" => 2325688716 // PIB em R$
    ],
    3106200 => [
        "nome" => "Belo Horizonte",
        "habitantes" => 2521564,
        "pib" => 14600000000 // PIB em R$
    ],
    1302603 => [
        "nome" => "Manaus",
        "habitantes" => 2134037,
        "pib" => 9222995000 // PIB em R$
    ],
    2907908 => [
        "nome" => "Salvador",
        "habitantes" => 2886698,
        "pib" => 2318880277 // PIB em R$
    ],
    4125506 => [
        "nome" => "Curitiba",
        "habitantes" => 1963726,
        "pib" => 8650583646 // PIB em R$
    ],
    2106200 => [
        "nome" => "São Luís",
        "habitantes" => 1106145,
        "pib" => 682387697 // PIB em R$
    ]
];

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabela de Cidades Brasileiras</title>
    <style>
        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            border: 1px solid #ccc;
        }
        th, td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>

    <h2 style="text-align: center;">Tabela de Cidades Brasileiras</h2>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Código IBGE</th>
                <th>Nome da Cidade</th>
                <th>Número de Habitantes</th>
                <th>PIB (em R$)</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $contador = 1; // Inicia o contador para numerar as cidades
            foreach ($cidades as $codigo => $dados): ?>
                <tr>
                    <td><?php echo $contador++; ?></td> <!-- Exibe o número da cidade -->
                    <td><?php echo $codigo; ?></td>
                    <td><?php echo $dados['nome']; ?></td>
                    <td><?php echo number_format($dados['habitantes'], 0, ',', '.'); ?></td>
                    <td>R$ <?php echo number_format($dados['pib'], 2, ',', '.'); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>
