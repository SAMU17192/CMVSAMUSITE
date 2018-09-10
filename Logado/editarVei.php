<?php
include "Codigo.php";

$id = $_GET["id"];
$nome = $_POST["nome"];
$placa = $_POST["placa"];
$km = $_POST["km"];
$sql = $conexao->prepare("UPDATE veiculos SET placa = ?, nomeveiculo = ?, kmveiculo = ? WHERE idveiculo=?");
$sql->bindParam(1,$placa);
$sql->bindParam(2,$nome);
$sql->bindParam(3,$km);
$sql->bindParam(4,$id);
$sql->execute();
?>
<script type="text/javascript"> alert("Veículo Atualizado Com Sucesso");</script>
<meta http-equiv="refresh" content="0;url=ConAmb.php">
