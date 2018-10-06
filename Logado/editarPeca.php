<?php
include "Codigo.php";

$id = $_GET["id"];
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$km = $_POST["km"];
$sql = $conexao->prepare("UPDATE pecas SET NomePeca = ?, DescricaoPeca = ?, KmLimitePeca = ? WHERE IdPeca=?");
$sql->bindParam(1,$nome);
$sql->bindParam(2,$descricao);
$sql->bindParam(3,$km);
$sql->bindParam(4,$id);
$sql->execute();
?>
<script type="text/javascript"> alert("Peça Atualizada Com Sucesso");</script>
<meta http-equiv="refresh" content="0;url=ConPeca.php">
