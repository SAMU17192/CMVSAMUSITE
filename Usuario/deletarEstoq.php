<meta charset="utf-8">
<?php

include_once "Codigo.php";

$id = $_GET["id"];
$sql = $conexao->prepare("DELETE FROM estoque WHERE IdEstoque = ?");
$sql->bindParam(1,$id);
$sql->execute();

?>
<script>
	alert("Excluído com sucesso!");
</script>
<meta http-equiv="refresh" content="0;url=ConEstoque.php">