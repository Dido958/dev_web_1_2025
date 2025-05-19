<?php
session_start();

if (!isset($_SESSION['usuario_logado'])) {
    header('Location: login.php');
    exit();
}

function calcularisco($gravidade,$idade){
switch($gravidade){
      case 'Leve': return $risco="Baixo";
      case 'Moderado': return $risco="Médio";
      case 'Alto': return $risco="Alto";
    }
	if($gravidade="Crítico"){
		if($idade<60){
			return $risco="Muito Alto";
		}
		elseif($idade>=60){
			return $risco="Extremo";
		}
	}
}

$emailUsuario = $_SESSION['usuario_logado'];
$nomeUsuario = $_SESSION['nome_usuario'];
$perfil= $_SESSION['perfil'];

$inicialUsuario = strtoupper(substr($nomeUsuario, 0, 1));

$pacientes = $_SESSION['pacientes'][$emailUsuario]??[];
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Lista de Pacientes</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h2>Pacientes Cadastrados</h2>
    <p><strong><?php echo $nomeUsuario; ?>:</strong><?php echo $emailUsuario;?>(<?php echo $perfil;?> )</p>

    <table>
      <thead>
        <tr>
          <th>Nome</th>
          <th>Idade</th>
          <th>Doença</th>
          <th>Gravidade</th>
          <th>Risco</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>João da Silva</td>
          <td>68</td>
          <td>Pneumonia</td>
          <td>Crítico</td>
          <td>Extremo</td>
        </tr>
		<?php
        foreach($pacientes as $paciente){
            $risc=calcularisco($paciente['gravidade'],$paciente['idade']);
        }
        ?>
        <tr>
          <td><?php echo $paciente["nome"]; ?></td>
          <td><?php echo $paciente["idade"]; ?></td>
          <td><?php echo $paciente["doenca"]; ?></td>
          <td><?php echo $paciente["gravidade"]; ?></td>
          <td><?php echo $risc; ?></td>
        </tr>

        <!-- Linhas geradas dinamicamente com PHP -->
      </tbody>
    </table>

    <p><a href="cadastro.php">➕ Cadastrar Novo Paciente</a></p>
  </div>
</body>
</html>
