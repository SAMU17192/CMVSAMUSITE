<?php

include_once "Codigo.php";

$id=0;
$placa = $_POST["placa"];
$nome = $_POST["nome"];
$km = $_POST["km"];



$sql = $con->prepare("INSERT INTO veiculos VALUES (?,?,?,?)");
$sql->bindParam(1,$id);
$sql->bindParam(2,$placa);
$sql->bindParam(3,$nome);
$sql->bindParam(4,$km);
$sql->execute();

?>
<script>
	alert("Ambulância cadastrada com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=CadAmb.html">