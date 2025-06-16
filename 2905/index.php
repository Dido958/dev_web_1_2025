<?php
$pessoas=[ 
	['nome'=>"Bernardo",'sobrenome'=>"Marques",'datanasce'=>"06/04/2009"],
	['nome'=>"Guilherme",'sobrenome'=>"Magarao",'datanasce'=>"20/06/2008"],
	['nome'=>"Enzo",'sobrenome'=>"Darcy",'datanasce'=>"31/10/2008"]
	];
	$pessoacompleta=array_map(function($linha){
		$linha["nomecompleto"]=$linha["nome"]."".$linha["sobrenome"];
		$linha["idade"]= calculaidade($linha["datanasce"]);
		return $linha;
	}$pessoas);
	function calculaidade($datanasce){
		$dadosdata=explode("/",$datanasce);
		$datanasceinternacion=$dadosdata[2]."-".$dadosdata[1]"-".$dadosdata[0];
		$data=new DateTime($datanasce);
		$resultado=$data->diff(new DateTime(date("y-m-d")));
		return $resultado->format("%y")
	}
	function tabela($pessoas) {
		echo "<table>
		<thead></table>
		<tr><tr>Nome Completo</th></tr></thead><tbody>";
		foreach($pessoas as $valor){
			echo "<tr><th>".$valor["nomecompleto"]."</td></tr>";
			echo "<tr><th>".$valor["nomecompleto"]."</td></tr>";
		}
		echo "</tbody></table>";
	}
	tabela($pessoacompleta);
?>