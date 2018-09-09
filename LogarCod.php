<?php 

	$senha = $_POST['senha'];

	if ($senha == "samu2018") {

		header("Location: Logado/Logado.php");

	}else {

		echo '<script type="text/javascript">
		alert("Senha incorreta");
		location.assign("index.php");
		</script>';


	}

 ?>
