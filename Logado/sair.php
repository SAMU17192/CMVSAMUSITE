<?php
//saindo da pagina inicial(desenho.php)
session_start();
session_destroy();
header("Location: ../index.php");
?>