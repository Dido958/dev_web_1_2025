<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit();
}

$emailUsuario = $_SESSION['usuario_logado'];
$nomeUsuario = $_SESSION['nome_usuario'];

$inicialUsuario = strtoupper(substr($nomeUsuario, 0, 1));
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Cadastro de Paciente</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="user-info">
      <span><?php echo $nomeUsuario;?>(<?php echo $emailUsuario;?>)</span>
    </div>

    <form method="post" action="cadastro.php">
      <label for="nome">Nome do Paciente:</label>
      <input type="text" name="nome" required>

      <label for="genero">Gênero:</label>
      <select name="genero" required>
        <option>Masculino</option>
        <option>Feminino</option>
        <option>Outro</option>
      </select>

      <label for="idade">Idade:</label>
      <input type="number" name="idade" required>

      <label for="sangue">Tipo Sanguíneo:</label>
      <select name="sangue" required>
        <option>A+</option>
        <option>A−</option>
        <option>B+</option>
        <option>B−</option>
        <option>AB+</option>
        <option>AB−</option>
        <option>O+</option>
        <option>O−</option>
      </select>
	  
      <label for="doenca">Doença Diagnosticada:</label>
      <input type="text" name="doenca" required>

      <label for="gravidade">Gravidade:</label>
      <select name="gravidade" required>
        <option>Leve</option>
        <option>Moderado</option>
        <option>Grave</option>
        <option>Crítico</option>
      </select>

      <label for="data">Data de Admissão:</label>
      <input type="date" name="data" required>

      <button type="submit">Cadastrar Paciente</button>
    </form>
	<?php
	$pacientes=[
      'nome'=>$_POST["nome"],
      'genero'=>$_POST["genero"],
      'idade'=>$_POST["idade"],
      'sangue'=>$_POST["sangue"],
      'doenca'=>$_POST["doenca"],
      'gravidade'=>$_POST["gravidade"],
	  'data'=>$_POST["data"]
    ];
	    if(!isset($_SESSION["pacientes"])){
      $_SESSION["pacientes"]=[];
    }
    $_SESSION["pacientes"][$emailUsuario][]=$pacientes;
	
    ?>
    <p><a href="lista.php">🔙 Ir para Lista de Pacientes</a></p>
  </div>
</body>
</html>
