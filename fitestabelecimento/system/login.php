<html lang="pt_br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style type="text/css">
	body{
		padding-top: 70px;
	}
	</style>
  </head>
  <body>
	<div class="container">
    <center><h3>Fit Estabelecimento</h3></center>
	<center><h4>Faça o Log-in com o Usuário e Senha fornecidos no E-mail</h4></center>
	<br><br>
	<div class="row">
	<form action="confirma.php" method="post">
	<div class="col-md-4 col-lg-4"></div>
	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		<div class="form-group">
			<label for="usuario">Usuário</label>
			<input type="text" class="form-control" name="usuario" id="usuario" placeholder="Usuário">
		</div>
		<div class="form-group">
			<label for="senha">Senha</label>
			<input type="password" class="form-control" name="senha" id="senha" placeholder="Senha">
		</div>
		<button type="submit" class="btn btn-light">Entrar</button>
	</div>	
	<div class="col-md-4 col-lg-4"></div>
	</form>
	</div>
	</div>
  </body>
</html>