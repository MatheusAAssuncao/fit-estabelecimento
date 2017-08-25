<?php
session_start();
include("../verifica.php");
include("../conexao.php");
header("Content-type: text/html; charset=utf-8");

$idCategoria = $_GET['idCategoria'];

if($idCategoria){
	$sql = "SELECT * FROM categoria WHERE idCategoria = '$idCategoria'";
	$resultado = mysql_query($sql, $conexao);
	mysql_close();
	$numRows = mysql_num_rows($resultado);
	if($numRows){
		$nome = mysql_result($resultado, 0, 'nome');
		
	}else{
		echo "<script>alert('Par\u00E2metros inv\u00E1lidos!'); self.location = 'index.php';</script>";
		
	}
}else{
	echo "<script>alert('Par\u00E2metros inv\u00E1lidos!'); self.location = 'index.php';</script>";
	
}

?>
<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="../js/mascara.js"></script>
	<script>
	function validar(){
		var nome = document.getElementById('nome').value;
		if(nome == ""){
			alert('Preencha o nome para continuar.');
			return false;
			
		}else{
			return true;
		}
	}
	</script>
  </head>
  <body>
  
	<!-- MENU -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="../estabelecimento/">Estabelecimentos</a></li>
			<li><a href="index.php">Categorias</a></li>
		</ul>
		</div>
	</nav>

	<!-- BUSCA -->
	<center>
	<form action="list.php" method="post">
	<div class="row">
		<div class="form-group">
		<div class="col-xs-8 col-sm-8 col-md-3 col-lg-3">
			<input type="text" class="form-control" name="busca" placeholder="Categoria">
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<button type="submit" class="btn btn-light" style="float: left;">Listar</button>
		</div>
		</div>
	</div>
	</form>
	</center>
	
	<!-- INICIO DA PÁGINA -->
	
	<div class="container">
    <center><h3>Alterar Categoria</h3></center>
	<form action="crud.php?crud=update" method="post">
	<input type="hidden" name="idCategoria" value="<?=$idCategoria?>">
	<!-- Linha 1 -->
	<div class="row">
		<div class="col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="nome">Nome:</label>
				<input type="text" class="form-control" style="text-transform:uppercase;" value="<?=$nome?>" name="nome" id="nome">
			</div>
		</div>
	<div class="col-md-4 col-lg-4"></div>
	</div>
	<div class="row">
		<div class="col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
			<button type="submit" onclick="return validar()" class="btn btn-default">Alterar</button>
		</div>
		<div class="col-md-4 col-lg-4"></div>
	</div>
	</form>
	</div>

  </body>
</html>