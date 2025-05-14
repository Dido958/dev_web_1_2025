<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit();
}

// Recupera os dados do usuário da sessão
$emailUsuario = $_SESSION['usuario_logado'];
$nomeUsuario = $_SESSION['nome_usuario'];

// Para o avatar (inicial do nome)
$inicialUsuario = strtoupper(substr($nomeUsuario, 0, 1));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Empregado</title>
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

    form input, form select {
      display: block;
      margin: 10px 0;
      padding: 8px;
      width: 300px;
    }

    button {
      padding: 10px 20px;
      background-color: #4285f4;
      color: white;
      border: none;
      cursor: pointer;
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
    <h2>Cadastro de Empregado</h2>
    <form action="" method="post">
      <input type="text" placeholder="Nome do Empregado" name="nome"required>
      <input type="email" placeholder="E-mail do Empregado" name="email" required>
      <select name="cargo" required>
        <option disabled selected >Selecione o Cargo</option>
        <option>Analista</option>
        <option>Desenvolvedor</option>
        <option>Gerente</option>
      </select>
      <input type="number" placeholder="Salário" name="salario" required>
      <input type="date" placeholder="Data de Admissão" name="datadeadmissao" required>
      <select name="departamento" required>
        <option disabled selected>Departamento</option>
        <option>TI</option><option>RH</option><option>Financeiro</option>
        <option>Marketing</option><option>Vendas</option>
      </select>
      <button type="submit">Cadastrar</button>
    </form>
    <?php
    $empregados=[
      'nome'=>$_POST["nome"],
      'email'=>$_POST["email"],
      'cargo'=>$_POST["cargo"],
      'salario'=>$_POST["salario"],
      'datadeadmissao'=>$_POST["datadeadmissao"],
      'departamento'=>$_POST["departamento"]
    ];
    if(!isset($_SESSION["empregados"])){
      $_SESSION["empregados"]=[];
    }
    $_SESSION["empregados"][$emailUsuario][]=$empregados;
    header("Location: cadastro.php");
    exit();
    ?>
  </main>
</body>
</html>