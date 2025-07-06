<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login - Sistema Hospitalar</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Login de Usurio</h2>
    <form method="post" action="">
      <label for="email">E-mail:</label>
      <input type="email" name="email" required>
      <label for="senha">Senha:</label>
      <input type="password" name="senha" required>
      <button type="submit">Entrar</button>
    </form>
  </div>
<?php
session_start();
if(!isset($_SESSION["login"])){
    $_SESSION["login"] = [];
}
if(isset($_POST["email"], $_POST["senha"])){
    $usuario = [];
    $usuario["email"] = $_POST["email"];
    $usuario["senha"] = $_POST["senha"];
    
    define("SEPARADOR", "#");
    $arquivo = fopen("dados.txt", "r");
    $linha = "";
    while(!feof($arquivo)){
        $linha = trim(fgets($arquivo));
        $dadoslogin = explode(SEPARADOR, $linha);

        $nome = $dadoslogin[1];
        $email = $dadoslogin[2];
        $senha = $dadoslogin[3];

        if($usuario["email"] == $email && $usuario["senha"] == $senha){
            $_SESSION["login"]["email"] = $nome;
            $_SESSION["login"]["email"] = $email;
            $_SESSION["login"]["email"] = $senha;
            echo "login efetuado com sucesso!";
            header("Location: deucerto.php");
            exit;
        }
    }
    echo "Deu erro";
}
?>