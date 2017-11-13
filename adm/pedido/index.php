<?php
	session_start();

	include '../../conexao.php';

	if(isset($_POST['login'])){
		$login = $_POST['login'];
		$senha = MD5($_POST['senha']);

		$consulta = mysqli_query($conn, "select * from cliente where email='$login' AND senha ='$senha' ");

		$user = mysqli_fetch_object($consulta);

		if($user){
			$_SESSION['cliente'] = $user->email;
		}

	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Pediso Cliente</title>
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
		<?php 
			if(isset($_SESSION['cliente'])) {
		?>
		<h1>Pedidos</h1>
		
		<?php
			// Se houver mensagens de erro, exibe-as
			if (isset($_GET['ms'])) {
				$ms = base64_decode(json_decode($_GET['ms']));
				foreach ($ms as $mss) {
					echo $mss . "<br />";
				}
			}
		?>

		<div>
			Meus Pedidos
		</div>
		<?php
		  }
		  else{
		  	include '../login.php';
		  }
		?>
	</body>
</html>