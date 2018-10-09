<?php 
		
	include_once "Codigo.php";

	$idamb = $_GET['idamb'];
	$idpeca = $_GET['idpeca'];
	$kmtroca = $_GET['kmtroca'];
	$id = 0;

	if (isset($_POST['estoque'])) {

		$verificacao = $_POST['estoque'];

		if ($estoque = 0) {

			$valor = $_POST['valorpeca'];

			$sqlVeiculo = $conexao->prepare("INSERT INTO troca VALUES (?,?,?,?,?,?,?)");
			$sqlVeiculo->bindParam(1,$id);
			$sqlVeiculo->bindParam(2,$idamb);
			$sqlVeiculo->bindParam(3,$idpeca);
			$sqlVeiculo->bindParam(4,$kmtroca);
			$sqlVeiculo->bindParam(5,$valor);
			$sqlVeiculo->bindParam(6,$estoque);
			$sqlVeiculo->bindParam(7,$kmtroca);
			$sqlVeiculo->execute();

			

		}
		if ($estoque = 1) {

		   /*include_once 'Codigo.php';
           $sqlEst = $conexao->query("SELECT * FROM estoque WHERE idpeca = $idpeca ");
           while ($resultadoEst = $sqlEst->fetch(PDO::FETCH_OBJ)) {*/
			$valor = 0;
			$sqlVeiculo = $conexao->prepare("INSERT INTO troca VALUES (?,?,?,?,?,?,?)");
			$sqlVeiculo->bindParam(1,$id);
			$sqlVeiculo->bindParam(2,$idamb);
			$sqlVeiculo->bindParam(3,$idpeca);
			$sqlVeiculo->bindParam(4,$kmtroca);
			$sqlVeiculo->bindParam(5,$valor);
			$sqlVeiculo->bindParam(6,$estoque);
			$sqlVeiculo->bindParam(7,$kmtroca);
			$sqlVeiculo->execute();
			#}
			
		}
	}else{

			$valor = $_POST['valorpeca'];

			$sqlVeiculo = $conexao->prepare("INSERT INTO troca VALUES (?,?,?,?,?,?,?)");
			$sqlVeiculo->bindParam(1,$id);
			$sqlVeiculo->bindParam(2,$idamb);
			$sqlVeiculo->bindParam(3,$idpeca);
			$sqlVeiculo->bindParam(4,$kmtroca);
			$sqlVeiculo->bindParam(5,$valor);
			$sqlVeiculo->bindParam(6,$estoque);
			$sqlVeiculo->bindParam(7,$kmtroca);
			$sqlVeiculo->execute();


	}


 ?>
 <script>
	alert("Peça trocada com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=Logado.php">