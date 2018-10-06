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

?>
<script>
	alert("Peça cadastrada com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=CadPeca.html">