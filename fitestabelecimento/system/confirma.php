<?php
	session_start();
	$usuario = $_POST['usuario'];
	$senha = $_POST['senha'];
	
	if($usuario == "fituser" && $senha == ""){
		$_SESSION['user'] = $usuario;
		$_SESSION['host'] = "fitestab.mysql.dbaas.com.br";
		$_SESSION['user'] = "fitestab";
		$_SESSION['password'] = "fitestab2017";
		$_SESSION['db'] = "fitestab";
		header('Location: estabelecimento/index.php');
	
	}else{
		echo "<script>alert('Usu\u00E1rio ou senha inv\u00E1lidos!'); self.location = 'index.php';</script>";
		
	}
?>