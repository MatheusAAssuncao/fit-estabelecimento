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
		$cnpj = $_POST['cnpj'];
		$razaoSocial = mb_strtoupper($_POST['razaoSocial']);
		$nomeFantasia = mb_strtoupper($_POST['nomeFantasia']);
		$email = mb_strtoupper($_POST['email']);
		$endereco = mb_strtoupper($_POST['endereco']);
		$cidade = mb_strtoupper($_POST['cidade']);
		$estado = $_POST['estado'];
		$telefone = $_POST['telefone'];
		$categoria = $_POST['categoria'];
		$status = $_POST['status'];
		$dataCadastro = $_POST['dataCadastro'];
		$data_quebrada = explode( "/", $dataCadastro);
		$data_nova[0] = $data_quebrada[2]."-".$data_quebrada[1]."-".$data_quebrada[0];
		$dataCadastro = $data_nova[0];
	}
		
	if($crud == 'insert'){
		$sql = "INSERT INTO estabelecimento (cnpj, razaoSocial, nomeFantasia, email, endereco, cidade, estado, telefone, dataCadastro, idCategoria, status) 
		VALUES ('$cnpj', '$razaoSocial', '$nomeFantasia', '$email', '$endereco', '$cidade', '$estado', '$telefone', '$dataCadastro', '$categoria', '$status')";
		if(mysql_query($sql, $conexao)){
			$idEstabelecimento = mysql_insert_id($conexao);
			mysql_close();
			echo "<script>alert('Registro Incluido!');     
			self.location = 'cad.php?idEstabelecimento=$idEstabelecimento';</script>";
			
		}else{
			echo "Erro na inclusão!";
			echo mysql_error();
			mysql_close();
			
		}
		
	}elseif($crud == 'update'){
		$idEstabelecimento = $_POST['idEstabelecimento'];
		$sql = "UPDATE estabelecimento SET cnpj = '$cnpj', razaoSocial = '$razaoSocial', nomeFantasia = '$nomeFantasia', email = '$email', 
		endereco = '$endereco', cidade = '$cidade', estado = '$estado', telefone = '$telefone', idCategoria = '$categoria', status = '$status'
		WHERE idEstabelecimento = '$idEstabelecimento'";
		if(mysql_query($sql, $conexao)){
			mysql_close();
			echo "<script>alert('Registro Alterado!');     
			self.location = 'cad.php?idEstabelecimento=$idEstabelecimento';</script>";
			
		}else{
			echo "Erro na alteração!";
			echo mysql_error();
			mysql_close();
			
		}
		
	}elseif($crud == 'delete'){
		$idEstabelecimento = $_POST['idEstabelecimento'];
		$sql = "DELETE FROM estabelecimento WHERE idEstabelecimento = '$idEstabelecimento'";
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