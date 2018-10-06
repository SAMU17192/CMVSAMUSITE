<?php 
		
	include_once "Codigo.php";

	$idamb = $_GET['idamb'];
	$idpeca = $_GET['idpeca'];
	$kmtroca = $_GET['kmtroca'];
	$id = 0;

	if (isset($_POST['estoque'])) {

		$estoque = $_POST['estoque'];
		echo "entrei";

		if ($estoque == 0) {

			$sqlTroca = $conexao->prepare("UPDATE trocas SET KmTroca = ? WHERE IdVeiculo = ? AND IdPeca = ?");
			$sqlTroca->bindParam(1,$kmtroca);
			$sqlTroca->bindParam(2,$idamb);
			$sqlTroca->bindParam(3,$idpeca);
			$sqlTroca->execute();

			$sql = "SELECT p.*, V.* FROM pecas as p INNER JOIN veiculos as v ON (p.IdPeca = $idpeca AND v.IdVeiculo = $idamb)";

            $sqlCons = $conexao->query($sql);
           
            while ($resultado = $sqlCons->fetch(PDO::FETCH_OBJ)) {

            $valor = $_POST['valorpeca'];	

            $teste = "Teste";
            $nota = 0;

			$sqlHis = $conexao->prepare("INSERT INTO historicotroca VALUES (?,?,?,?,?,?,?,?,now())");
			$sqlHis->bindParam(1,$id);
			$sqlHis->bindParam(2,$resultado->NomeVeiculo);
			$sqlHis->bindParam(3,$resultado->NomePeca);
			$sqlHis->bindParam(4,$kmtroca);
			$sqlHis->bindParam(5,$estoque);
			$sqlHis->bindParam(6,$valor);
			$sqlHis->bindParam(7,$nota);
			$sqlHis->bindParam(8,$teste);

			
			$sqlHis->execute();

			}
		}
		if ($estoque == 1) {

			$sqlTroca = $conexao->prepare("UPDATE trocas SET KmTroca = ? WHERE IdVeiculo = ? AND IdPeca = ?");
			$sqlTroca->bindParam(1,$kmtroca);
			$sqlTroca->bindParam(2,$idamb);
			$sqlTroca->bindParam(3,$idpeca);
			$sqlTroca->execute();

			$sql = "SELECT p.*, V.* FROM pecas as p INNER JOIN veiculos as v ON (p.idpeca = $idpeca AND v.idveiculo = $idamb)";

            $sqlCons = $conexao->query($sql);
           
            while ($resultado = $sqlCons->fetch(PDO::FETCH_OBJ)) {

            $valor = 0;	

            $teste = "Teste";
            $nota = 0;

			$sqlHis = $conexao->prepare("INSERT INTO historicotroca VALUES (?,?,?,?,?,?,?,?,now())");
			$sqlHis->bindParam(1,$id);
			$sqlHis->bindParam(2,$resultado->NomeVeiculo);
			$sqlHis->bindParam(3,$resultado->NomePeca);
			$sqlHis->bindParam(4,$kmtroca);
			$sqlHis->bindParam(5,$estoque);
			$sqlHis->bindParam(6,$valor);
			$sqlHis->bindParam(7,$nota);
			$sqlHis->bindParam(8,$teste);

			
			$sqlHis->execute();

			}
		}
	}
 ?>
<script>
	alert("Peça trocada com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=Logado.php">
