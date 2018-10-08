<meta charset="utf-8">
<?php

include_once "Codigo.php";

$id=0;
$nomepeca = $_POST["nomepeca"];
$descricao = $_POST["descricao"];
$kmlimite = $_POST["kmlimite"];

$sql = $conexao->prepare("INSERT INTO pecas VALUES (?,?,?,?)");
$sql->bindParam(1,$id);
$sql->bindParam(2,$nomepeca);
$sql->bindParam(3,$descricao);
$sql->bindParam(4,$kmlimite);
$sql->execute();

$consulta = $conexao->query("SELECT * FROM  veiculos");

while($resultado = $consulta->fetch(PDO::FETCH_OBJ)){

$consulta2 = $conexao->query("SELECT max(IdPeca) FROM pecas");//aqui eu pego o valor da variavel query
foreach ($consulta2->fetch(PDO::FETCH_OBJ) as $linha) {
	
	$idTroca = 0;
	$troca = 1;

	$sqlTroca = $conexao->prepare("INSERT INTO trocas VALUES (?,?,?,?,?,?,?)");
	$sqlTroca->bindParam(1,$idTroca);
	$sqlTroca->bindParam(2,$resultado->IdVeiculo);
	$sqlTroca->bindParam(3,$linha);
	$sqlTroca->bindParam(4,$resultado->KmVeiculo);
	$sqlTroca->bindParam(5,$resultado->KmVeiculo);
	$sqlTroca->bindParam(6,$kmlimite);
	$sqlTroca->bindParam(7,$troca);

	$sqlTroca->execute();

}
}

?>
<script>
	alert("Peça cadastrada com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=CadPeca.html">