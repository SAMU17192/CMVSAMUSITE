<?php
include "Codigo.php";

$id = $_GET["id"];
$nome = $_POST["nome"];
$km = $_POST["km"];
$sql = $conexao->prepare("UPDATE pecas SET nomepeca = ?, kmlimite = ? WHERE idpeca=?");
$sql->bindParam(1,$nome);
$sql->bindParam(2,$km);
$sql->bindParam(3,$id);
$sql->execute();
?>
<script type="text/javascript"> alert("Peça Atualizada Com Sucesso");</script>
<meta http-equiv="refresh" content="0;url=ConPeca.php">
