<?php 

	$senha = $_POST['senha'];

	if ($senha == "admin") {

		header("Location: Logado/Logado.php");

	}elseif ($senha == "samu2018") {
		header("Location: Usuario/Logado.php");
	}
	else{
		echo '<script type="text/javascript">
		alert("Senha incorreta");
		location.assign("index.php");
		</script>';


	}

 ?>
