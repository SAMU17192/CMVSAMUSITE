<?php

	header("Access-Control-Allow-Origin: *");
	include_once("../codigo.php");
	$texto = $_POST["filtro"];
		// fazendo uma consulta de todos os clientes que o nome seja igual o texto digitado

		$sql = "SELECT * FROM historicotroca WHERE NomeVeiculo LIKE '%$texto%'";

		$consulta = $conexao->query($sql);

		$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);

		$retorno = count($dados);

		if ($retorno > 0) {
			for ($i = 0; $i < count($dados); $i++) { 
				$vetor[] = array_map("utf8_encode", $dados[$i]);
			}
			echo json_encode($vetor);
		}
		else{
			echo 1;
		}
		if (isset($_POST)) {
			$tipo = $_POST["tipo"];
			if ($tipo == "pesqueamb") {
				
			}
		}
?>