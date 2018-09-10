<?php

include_once "Codigo.php";

$id=0;
$nomepeca = $_POST["nomepeca"];
$kmlimite = $_POST["kmlimite"];

$sql = $conexao->prepare("INSERT INTO pecas VALUES (?,?,?)");
$sql->bindParam(1,$id);
$sql->bindParam(2,$nomepeca);
$sql->bindParam(3,$kmlimite);
$sql->execute();

?>
<script>
	alert("Peça cadastrada com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=CadPeca.html">