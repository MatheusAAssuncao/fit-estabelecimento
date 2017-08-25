<?php
	session_start();
	include("../verifica.php");
	include("../conexao.php");
	header("Content-type: text/html; charset=utf-8");
	
	$crud = $_GET['crud'];
	if(!$crud){
		echo "<script>alert('Par\u00E2metros incorretos.'); self.location = 'index.php';</script>";
		exit();
	}
	if($crud != 'delete'){
		$nome = mb_strtoupper($_POST['nome']);
	}
		
	if($crud == 'insert'){
		$sql = "INSERT INTO categoria (nome) VALUES ('$nome')";
		if(mysql_query($sql, $conexao)){
			$idCategoria = mysql_insert_id($conexao);
			mysql_close();
			echo "<script>alert('Registro Incluido!');     
			self.location = 'cad.php?idCategoria=$idCategoria';</script>";
			
		}else{
			echo "Erro na inclusão!";
			echo mysql_error();
			mysql_close();
			
		}
		
	}elseif($crud == 'update'){
		$idCategoria = $_POST['idCategoria'];
		$sql = "UPDATE categoria SET nome = '$nome' WHERE idCategoria = '$idCategoria'";
		if(mysql_query($sql, $conexao)){
			mysql_close();
			echo "<script>alert('Registro Alterado!');     
			self.location = 'cad.php?idCategoria=$idCategoria';</script>";
			
		}else{
			echo "Erro na alteração!";
			echo mysql_error();
			mysql_close();
			
		}
		
	}elseif($crud == 'delete'){
		$idCategoria = $_POST['idCategoria'];
		$sql = "DELETE FROM categoria WHERE idCategoria = '$idCategoria'";
		if(mysql_query($sql, $conexao)){
			mysql_close;
			echo "<script>alert('Registro exclu\u00EDdo!');     
			self.location = 'list.php';</script>";
			
		}else{
			mysql_close;
			echo "<script>alert('N\u00E3o foi poss\u00EDvel excluir o registro selecionado.');     
			self.location = 'list.php';</script>";
			
		}
		
	}else{
		echo "<script>alert('Par\u00E2metros incorretos.'); self.location = 'index.php';</script>";
		exit();
	}
	
?>