<?php

	header("Access-Control-Allow-Origin: *");
	include_once("../Codigo.php");
	if (isset($_POST)) {
		$tipo = $_POST['tipo'];
		if ($tipo == "pesqhis") {
			
			$texto = $_POST["filtro"];
				// fazendo uma consulta de todos os clientes que o nome seja igual o texto digitado

				$sql = "SELECT *, DATE_FORMAT(Data, '%d/%m/%Y') as 'dataform' FROM historicotroca WHERE NomeVeiculo LIKE '%$texto%'";

				$consulta = $conexao->query($sql);

				$dados = $consulta->fetchAll(PDO::FETCH_ASSOC);

				$retorno = count($dados);

				if ($retorno > 0) {
					for ($i = 0; $i < count($dados); $i++) { 
						$vetor[] =  $dados[$i];
					}
					echo json_encode($vetor);
				}
				else{
					echo 1;
				}

		}	
		if ($tipo == "pesqamb") {
			
			$id = $_POST["id"];

				$sql = "SELECT t.*, v.NomeVeiculo, p.NomePeca FROM trocas as t INNER JOIN veiculos as v INNER JOIN pecas as p on (t.IdVeiculo = $id and v.IdVeiculo = $id and t.IdPeca = p.IdPeca) ORDER BY t.IdVeiculo ASC ";

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

		}
		if ($tipo == "pesqtroca") {
			$IdVeiculo = $_POST['IdVeiculo'];
			$IdPeca	= $_POST['IdPeca'];

				$sql = "SELECT t.*, v.NomeVeiculo, p.NomePeca FROM trocas as t INNER JOIN veiculos as v INNER JOIN pecas as p on (t.IdVeiculo = $IdVeiculo and v.IdVeiculo = $IdVeiculo and t.IdPeca = $IdPeca AND p.IdPeca = $IdPeca) ";

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
		}
		if ($tipo == "pesqtrocaes") {
			$idpeca = $_POST['IdPeca'];
			$sqlEstoque = $conexao->query("SELECT * FROM estoque WHERE NomePeca = $idpeca AND quantidade > 0");
            $resultadoEstoque = $sqlEstoque->fetch(PDO::FETCH_OBJ);
            
            if ($resultadoEstoque == true) {

            	echo 1;

            }else{

            	echo 0;

            }
		}

	}
?>