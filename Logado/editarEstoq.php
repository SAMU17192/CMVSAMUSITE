<?php
include "Codigo.php";

$id = $_GET["id"];
$IdPeca = $_POST["IdPeca"];
$qtd = $_POST["quantidade"];
$local = $_POST["local"];
$notaF = $_POST["notaF"];

$origem = array(".",",");
$troca = array("",".");
$valor = str_replace($origem, $troca, $_POST["valor"]);

$data = $_POST["data"];

$sql = $conexao->prepare("UPDATE estoque SET NomePeca = ?, Quantidade = ?, LocalCompra = ?, NotaF = ?, ValorCompra = ?, DataEstoque = ? WHERE IdEstoque = ?");

$sql->bindParam(1,$IdPeca);
$sql->bindParam(2,$qtd);
$sql->bindParam(3,$local);
$sql->bindParam(4,$notaF);
$sql->bindParam(5,$valor);
$sql->bindParam(6,$data);
$sql->bindParam(7,$id);
$sql->execute();
?>
<script type="text/javascript"> alert("Atualizado Com Sucesso");</script>
<meta http-equiv="refresh" content="0;url=ConEstoque.php">
