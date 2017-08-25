<?php
session_start();
include("../verifica.php");
include("../conexao.php");
header("Content-type: text/html; charset=utf-8");


$cnpj = $_POST['cnpj'];
$razaoSocial = $_POST['razaoSocial'];
if($cnpj) echo "<script>window.onload = function(){document.getElementById('nomeFantasia').focus();};</script>";
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
	function validar1(){
		var cnpj = document.getElementById('cnpj1').value;
		var razaoSocial = document.getElementById('razaoSocial1').value;
		if(cnpj == "" || razaoSocial == ""){
			alert('Preencha o CNPJ e a Raz\u00E3o Social para continuar.');
			return false;
			
		}else{
			return true;
			
		}
	}
	
	function validar2(){
		var cnpj = document.getElementById('cnpj').value;
		var razaoSocial = document.getElementById('razaoSocial').value;
		var categoria = $('#categoria option:selected').text();
		var telefone = document.getElementById('telefone').value;
		if(cnpj == "" || razaoSocial == ""){
			alert('Preencha o CNPJ e a Raz\u00E3o Social para continuar.');
			return false;
			
		}else{
			if(categoria == "SUPERMERCADO"){
				if(telefone == ""){
					alert('O Telefone \u00E9 obrigat\u00F3rio para a categoria Supermercado.');
					document.getElementById('telefone').focus();
					return false;
					
				}else return true;
				
			}else return true;
		}
	}
	</script>
  </head>
  <body>
  
	<!-- MENU -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
		<ul class="nav navbar-nav">
			<li><a href="index.php">Estabelecimentos</a></li>
			<li><a href="../categoria/">Categorias</a></li>
		</ul>
		</div>
	</nav>

	<!-- BUSCA -->
	<center>
	<form action="list.php" method="post">
	<div class="row">
		<div class="form-group">
		<div class="col-xs-8 col-sm-8 col-md-3 col-lg-3">
			<input type="text" class="form-control" name="busca" placeholder="Estabelecimento">
		</div>
		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<button type="submit" class="btn btn-light" style="float: left;">Listar</button>
		</div>
		</div>
	</div>
	</form>
	</center>
	
	<!-- INICIO DA PÁGINA -->
	
	<?
		if(!$cnpj){
	?>
	
	<div class="container">
    <center><h3>Cadastrar Estabelecimento</h3></center>
	<div class="row">
		<div class="col-md-4 col-lg-4"></div>
		<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<form action="index.php" method="post">
			<div class="form-group">
				<label for="cnpj">CNPJ:</label>
				<input type="text" class="form-control" maxlength="18" onKeyDown="Mascara(this, Cnpj)" name="cnpj" id="cnpj1">
			</div>
			<div class="form-group">
				<label for="razaoSocial">Razão Social:</label>
				<input type="text" class="form-control" style="text-transform:uppercase;" name="razaoSocial" id="razaoSocial1">
			</div>
			<button type="submit" onclick="return validar1()" style="text-transform:uppercase;" class="btn btn-default">Enviar</button>
		</form>
		</div>
		<div class="col-md-4 col-lg-4"></div>
	</div>
	</div>
	
	<?
		}else{
	?>
	
	<div class="container">
    <center><h3>Cadastrar Estabelecimento</h3></center>
	<form action="crud.php?crud=insert" method="post">
	<!-- Linha 1 -->
	<div class="row">
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="razaoSocial">Razão Social:</label>
				<input type="text" class="form-control" style="text-transform:uppercase;" value="<?=$razaoSocial?>" name="razaoSocial" id="razaoSocial">
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="cnpj">CNPJ:</label>
				<input type="text" class="form-control" maxlength="18" onKeyDown="Mascara(this, Cnpj)" value="<?=$cnpj?>" name="cnpj" id="cnpj">
			</div>
		</div>
		<div class="col-md-2 col-lg-2"></div>
	</div>
	<!-- Linha 2 -->
	<div class="row">
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="nomeFantasia">Nome Fantasia:</label>
				<input type="text" class="form-control" style="text-transform:uppercase;" name="nomeFantasia" id="nomeFantasia">
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="email">E-mail:</label>
				<input type="text" class="form-control" style="text-transform:uppercase;" onBlur="ValidaEmail(this);" name="email" id="email">
			</div>
		</div>
		<div class="col-md-2 col-lg-2"></div>
	</div>
	<!-- Linha 3 -->
	<div class="row">
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="endereco">Endereço:</label>
				<input type="text" class="form-control" style="text-transform:uppercase;" name="endereco" id="endereco">
			</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-3 col-lg-3">
			<div class="form-group">
				<label for="cidade">Cidade:</label>
				<input type="text" class="form-control" style="text-transform:uppercase;" name="cidade" id="cidade">
			</div>
		</div>
		<div class="col-xs-4 col-sm-4 col-md-1 col-lg-1">
			<div class="form-group">
				<label for="estado">UF:</label>
				<select class="form-control" name="estado" id="estado">
				<option value="AC">AC</option>
				<option value="AL">AL</option>
				<option value="AM">AM</option>
				<option value="AP">AP</option>
				<option value="BA">BA</option>
				<option value="CE">CE</option>
				<option value="DF">DF</option>
				<option value="ES">ES</option>
				<option value="GO">GO</option>
				<option value="MA">MA</option>
				<option value="MG">MG</option>
				<option value="MS">MS</option>
				<option value="MT">MT</option>
				<option value="PA">PA</option>
				<option value="PB">PB</option>
				<option value="PE">PE</option>
				<option value="PI">PI</option>
				<option value="PR">PR</option>
				<option value="RJ">RJ</option>
				<option value="RN">RN</option>
				<option value="RS">RS</option>
				<option value="RO">RO</option>
				<option value="RR">RR</option>
				<option value="SC">SC</option>
				<option value="SE">SE</option>
				<option value="SP">SP</option>
				<option value="TO">TO</option>
				<option value="EX">EX</option>
				</select>
			</div>
		</div>
		<div class="col-md-2 col-lg-2"></div>
	</div>
	<!-- Linha 4 -->
	<div class="row">
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="telefone">Telefone:</label>
				<input type="text" class="form-control" onKeyDown="Mascara(this, mtel);" maxlength="15" name="telefone" id="telefone">
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="categoria">Categoria:</label>
				<select class="form-control" name="categoria" id="categoria">
				<option value="">Sem Categoria</option>
				<?
				$resultado = mysql_query("SELECT idCategoria, nome FROM categoria ORDER BY nome", $conexao);
				mysql_close();
				while($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
					echo "<option value='$row[idCategoria]'>$row[nome]</option>";
				}
				?>
				</select>
			</div>
		</div>
		<div class="col-md-2 col-lg-2"></div>
	</div>
	<!-- Linha 5 -->
	<div class="row">
		<div class="col-md-2 col-lg-2"></div>
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="status">Status:</label>
				<select class="form-control" name="status" id="status">
					<option value="1">Ativo</option>
					<option value="0">Inativo</option>
				</select>
			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-4 col-lg-4">
			<div class="form-group">
				<label for="dataCadastro">Data de Cadastro:</label>
				<input type="text" class="form-control" readonly value="<?=date('d/m/Y');?>" name="dataCadastro" id="dataCadastro">
			</div>
		</div>
		<div class="col-md-2 col-lg-2"></div>
	</div>
	<div class="row">
	<div class="col-md-2 col-lg-2"></div>
	<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
		<button type="submit" onclick="return validar2()" class="btn btn-default">Salvar</button>
	</div>
	<div class="col-md-2 col-lg-2"></div>
	</div>
	
	</form>
	</div>
	
	<?
		}
	?>
  </body>
</html>