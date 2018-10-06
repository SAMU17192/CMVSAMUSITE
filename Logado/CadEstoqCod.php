<meta charset="utf-8">
<?php

include_once "Codigo.php";

$id = 0;
$nome = $_POST["nome"];
$qtd = $_POST["quantidade"];
$local = $_POST["local"];
$notaF = $_POST["notaF"];

$origem = array(".",",");
$troca = array("",".");
$valor = str_replace($origem, $troca, $_POST["valor"]);

$data = $_POST["data"];



$sqlEstoque = $conexao->prepare("INSERT INTO estoque VALUES (?,?,?,?,?,?,?)");
$sqlEstoque->bindParam(1,$id);
$sqlEstoque->bindParam(2,$nome);
$sqlEstoque->bindParam(3,$qtd);
$sqlEstoque->bindParam(4,$local);
$sqlEstoque->bindParam(5,$notaF);
$sqlEstoque->bindParam(6,$valor);
$sqlEstoque->bindParam(7,$data);
$sqlEstoque->execute();

?>
<script>
	alert("Cadastrado com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=CadEstoque.php">