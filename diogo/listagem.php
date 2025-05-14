<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit();
}

function calcula($salario,$cargo){
if($salario<=5000){
    switch($cargo){
      case 'Analista': return $salario*0.10;
      case 'Gerente': return $salario*0.12;
      case 'Desenvolvedor': return $salario*0.11;
    }
  }
  elseif ($salario>5000&&$salario<=15000) {
      switch($cargo){
      case 'Analista': return $salario*0.12;
      case 'Gerente': return $salario*0.14;
      case 'Desenvolvedor': return $salario*0.13;
    }
  }
  elseif($salario>15000){
      switch($cargo){
      case 'Analista': return $salario*0.18;
      case 'Gerente': return $salario*0.18;
      case 'Desenvolvedor': return $salario*0.18;
    }
  }
}
// Recupera os dados do usuário da sessão
$emailUsuario = $_SESSION['usuario_logado'];
$nomeUsuario = $_SESSION['nome_usuario'];

// Para o avatar (inicial do nome)
$inicialUsuario = strtoupper(substr($nomeUsuario, 0, 1));

$empregados = $_SESSION['empregados'][$emailUsuario]??[];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Listagem de Empregados</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
    }

    header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: #f1f3f4;
      padding: 10px 20px;
      border-bottom: 1px solid #ccc;
    }

    nav {
      display: flex;
      gap: 15px;
    }

    nav a {
      text-decoration: none;
      color: #4285f4;
      font-weight: bold;
    }

    nav a:hover {
      color: #357ae8;
    }

    .user-info {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .user-avatar {
      width: 32px;
      height: 32px;
      background-color: #4285f4;
      color: white;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
    }

    main {
      padding: 20px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
    }

    th, td {
      border: 1px solid #ccc;
      padding: 10px;
      text-align: left;
    }

    th {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>
  <header>
    <nav>
      <a href="cadastro.php">Cadastro</a>
      <a href="listagem.php">Listagem</a>
    </nav>
    <h2>Cadastro de Empregados</h2>
    <div class="user-info">
       <span><?php echo $nomeUsuario;?>(<?php echo $emailUsuario;?>)</span>
      <div class="user-avatar"><?php echo $inicialUsuario;?></div>
    </div>
  </header>
  <main>
    <h2>Empregados Cadastrados</h2>
    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Cargo</th>
          <th>E-mail</th>
          <th>Salário (R$)</th>
          <th>Imposto (R$)</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>João Silva</td>
          <td>Analista</td>
          <td>joao@email.com</td>
          <td>2.800,00</td>
          <td>280,00</td>
        </tr>
        <?php
        foreach($empregados as $empregado){
            $imposto=calcula($empregado['salario'],$empregado['cargo']);
        }
        ?>
        <tr>
          <td><?php echo $empregado['nome'];?></td>
          <td><?php echo $empregado['email'];?></td>
          <td><?php echo $empregado['cargo'];?></td>
          <td><?php echo $empregado['salario']?></td>
          <td><?php echo $imposto;?></td>
        </tr>
        <!-- Outras linhas podem ser adicionadas aqui -->
      </tbody>
    </table>
  </main>
</body>
</html>