<?php
session_start();
include("../verifica.php");
include("../conexao.php");
header("Content-type: text/html; charset=utf-8");

$busca = trim($_POST['busca']);
$sql = "SELECT e.idEstabelecimento, e.cnpj, e.nomeFantasia, e.status, c.nome FROM estabelecimento e LEFT JOIN categoria c ON e.idCategoria = c.idCategoria WHERE (e.cnpj LIKE '%$busca%' OR e.razaoSocial LIKE '%$busca%' OR e.nomeFantasia LIKE '%$busca%' OR e.email LIKE '%$busca%') ORDER BY e.nomeFantasia";
$resultado = mysql_query($sql, $conexao);
mysql_close();
$numRows = mysql_num_rows($resultado);
if(!$numRows) echo "<script>alert('Nenhum resultado encontrado.'); self.location = 'index.php';</script>";
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
		function excluirRegistro(){
			return confirm("Deseja excluir este estabelecimento?");
			
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
	
	<div class="container">
    <center><h3>Estabelecimentos</h3></center>
	<div class="row">
		<div class="col-md-1 col-lg-1"></div>
		<div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">
		<div class="table-responsive">
			<table class="table table-striped">
				<tr>
					<td style="width: 20%;"><strong>CNPJ</strong></td>
					<td style="width: 40%;"><strong>Nome Fantasia</strong></td>
					<td style="width: 15%;"><strong>Status</strong></td>
					<td style="width: 20%;"><strong>Categoria</strong></td>
					<td style="width: 5%;"><strong></strong></td>
				</tr>
			<?
				while($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
					echo "<tr onclick=\"location.href='cad.php?idEstabelecimento=$row[idEstabelecimento]';\" style='cursor: hand;'>";
					echo "<td style='width: 20%;'>$row[cnpj]</td>";
					echo "<td style='width: 40%;'>$row[nomeFantasia]</td>";
					echo "<td style='width: 15%;'>";
					if($row['status']) echo 'Ativo'; else echo 'Inativo'; echo"</td>";
					echo "<td style='width: 20%;'>$row[nome]</td>";
					echo "</a>";
					echo "<td style='width: 5%;'><form method='post' action='crud.php?crud=delete'>
					<input type='hidden' name='idEstabelecimento' value='$row[idEstabelecimento]'>
					<input type='submit' onclick='return excluirRegistro()' class='btn btn-primary btn-xs' value='Excluir'>
					</form>
					</td>";
					echo '</tr>';
					
				}
			?>
			</table>
		</div>
		</div>
		<div class="col-md-1 col-lg-1"></div>
	</div>
	</div>
  </body>
</html>