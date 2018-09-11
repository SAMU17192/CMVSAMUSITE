<meta charset="utf-8">
<?php

include_once "Codigo.php";

$id=0;
$placa = $_POST["placa"];
$nome = $_POST["nome"];
$km = $_POST["km"];



$sqlVeiculo = $conexao->prepare("INSERT INTO veiculos VALUES (?,?,?,?,?)");
$sqlVeiculo->bindParam(1,$id);
$sqlVeiculo->bindParam(2,$placa);
$sqlVeiculo->bindParam(3,$nome);
$sqlVeiculo->bindParam(4,$km);
$sqlVeiculo->bindParam(5,$km);
$sqlVeiculo->execute();


$sqlVei = $conexao->prepare("SELECT max(idveiculo) FROM veiculos");
$sqlVei->execute();
$resultado = $sqlVei->fetchAll(PDO::FETCH_ASSOC);
foreach ($resultado as $valor) {
$final = $valor['max(idveiculo)'];
$sqlTroca = $conexao->prepare("INSERT INTO troca VALUES (?,?,?,?,?)");
$sqlTroca->bindParam(1,$id);
$sqlTroca->bindParam(2,$final);
$sqlTroca->bindParam(3,$id);
$sqlTroca->bindParam(4,$id);
$sqlTroca->bindParam(5,$id);
$sqlTroca->execute();
}

?>
<script>
	alert("Veículo cadastrada com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=CadAmb.html">