<?php
session_start();
?>
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
      <label for="perfil">Perfil:</label>
      <select name="perfil" required>
        <option value="">Selecione o perfil</option>
        <option value="Recepcionista">Recepcionista</option>
        <option value="Médico">Médico</option>
        <option value="Enfermeiro">Enfermeiro</option>
      </select>
      <button type="submit">Entrar</button>
    </form>
  </div>
  <?php
  $usuarios = [
    [
        'nome' => 'pipi',
        'email' => 'pipi@gmail.com',
        'senha' => '123',
		    'perfil' => 'Recepcionista'
    ],
    [
        'nome' => 'marques',
        'email' => 'marques@yahoo.com',
        'senha' => 'mques',
		    'perfil' => 'Enfermeiro'
    ],
    [
        'nome' => 'gueilherme',
        'email' => 'guigui@hotmail.com',
        'senha' => 'genshin',
		    'perfil' => 'Médico'
    ]
];	
	$_SESSION["login"]=[];
	if(isset($_POST["email"], $_POST["senha"], $_POST['perfil'])){	
	foreach($usuarios as $usuario){
	if($_POST["email"]==$usuario['email']&&$_POST["senha"]==$usuario['senha']&&$_POST['perfil']==$usuario['perfil']){ 
		$_SESSION["usuario_logado"]=$usuario["email"];
		$_SESSION["perfil"]=$usuario["perfil"];
		$_SESSION["nome_usuario"]=$usuario["nome"];
		header("Location: lista.php"); 
		exit();
    }
  }
	echo "e-mail ou senha inválidos"; 
	} ?>
</body>
</html>
