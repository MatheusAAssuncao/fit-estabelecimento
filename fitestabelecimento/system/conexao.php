<?php
	session_start();
	
	$db = $_SESSION['db'];
	$host = $_SESSION['host'];
	$user = $_SESSION['user'];
	$password = $_SESSION['password'];

	$conexao = mysql_connect($host, $user, $password);

	if($conexao) {
		mysql_select_db($db, $conexao);
		mysql_set_charset('utf8');
		
	}else {
		echo "<strong>Não foi possível abrir o banco de dados!<strong><br />".mysql_error();
		exit();
	}
?>