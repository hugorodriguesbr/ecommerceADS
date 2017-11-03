<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Cadastro</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<!-- Fontss -->
		<link rel="stylesheet" href="../../less/font-awesome.min.css">
		<!-- Importar arquivo LESS-->
		<link rel="stylesheet/less" type="text/css" href="../../less/style.less" />
		<!-- Incluir script de execução CDN -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>
		<!-- Importar arquivo CSS-->
		<link rel="stylesheet" type="text/css" href="../../less/style.css" />
	</head>
	<body>
		<h1>Cadastro de produtos</h1>
		
		<form action="cadastrar.php" method="post" enctype="multipart/form-data" name="cadastro" >
			Nome:<br />
			<input type="text" name="nome" /><br /><br />
			Descrição:<br />
			<input type="text" name="descricao" /><br /><br />
			Valor:<br />
			<input type="text" name="valor" /><br /><br />
			Número de estrelas:<br />
			<input type="text" name="estrelas" /><br /><br />
			Foto de exibição:<br />
			<input type="file" name="foto" /><br /><br />
			<input type="submit" name="cadastrar" value="Cadastrar" />
		</form>
		<hr>
		<a href='listar.php'>Listar produtos</a> <br />
		<a href='deletar.php'>Deletar Produtos</a>
	</body>
</html>