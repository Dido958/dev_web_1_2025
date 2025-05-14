<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Cadastro de Empregados</title>
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

    main {
      padding: 20px;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 80vh;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      width: 300px;
    }

    form input {
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    form button {
      padding: 10px;
      background-color: #4285f4;
      color: white;
      font-size: 16px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }
/*$_SESSION["cadastros"]=[];
if (isset($_POST["email"], $_POST["senha"])) {
    foreach ($usuarios as $usuario) {
        if ($_POST["email"] == $usuario['email'] && $_POST["senha"] == $usuario['senha']) {
            $_SESSION["usuario_logado"] = $usuario;
            header("Location: listagem.php");
            exit;
        }
    }
    echo "E-mail ou senha inválidos!";
}*/
    form button:hover {
      background-color: #357ae8;
    }
  </style>
</head>
<body>
  <header>
    <h2>Cadastro de Empregados</h2>
  </header>

  <main>
    <form action="" method="post">
      <h2>Login</h2>
      <input type="email" placeholder="E-mail" name="email" required>
      <input type="password" placeholder="Senha" name="senha" required>
      <button type="submit">Entrar</button>
    </form>
  </main>
<?php
$usuarios = [
    [
        'nome' => 'usuario1',
        'email' => 'usuario1@gmail.com',
        'senha' => 'a8XkP2zq'
    ],
    [
        'nome' => 'usuario2',
        'email' => 'usuario2@yahoo.com',
        'senha' => 'Lm9vT7sE'
    ],
    [
        'nome' => 'usuario3',
        'email' => 'usuario3@hotmail.com',
        'senha' => 'Pq4rZ1wL'
    ]
];
$_SESSION["cadastros"]=[];
if(isset($_POST["email"], $_POST["senha"])){//verifica se ja foi setado
  foreach($usuarios as $usuario){//varre atribuindo a um segundo array
    if($_POST["email"]==$usuario['email'] && $_POST["senha"]==$usuario['senha']){//compara os valores 
      $_SESSION["usuario_logado"]=$usuario["email"];
      $_SESSION["senha"]=$usuario["senha"]
      $_SESSION["nome_usuario"]=$usuario["nome"];//atribui os valores
      header("Location: listagem.php");//redireciona pra um segunda pagina 
      exit;
    }
  }
  echo "login ou senha inválidos";
} 
?>
</body>
</html>