<?php
session_start();

if(isset($_SESSION['user'])) 
{
	include "../../conexao.php";
	$result = '';

	// ID de exemplo
	$id = '';
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
	}

	if(is_numeric($id)){
		// Selecionando nome da foto do usuário
		$sql = mysqli_query($conn,"SELECT foto FROM produtos WHERE id = '".$id."'");
		$usuario = mysqli_fetch_object($sql);
		 
		// Removendo usuário do banco de dados
		$sql = mysqli_query($conn,"DELETE FROM produtos WHERE id = '".$id."'");
		if($sql === true){
			// Removendo imagem da pasta fotos/
			unlink("../../img/".$usuario->foto."");
			$result =  "Produto Apagado!";
		}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Template simples E-commerce</title>
		<!-- Importar arquivo LESS-->
		<link rel="stylesheet/less" type="text/css" href="../../less/style.less" />
		<!-- Incluir script de execução CDN -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>
	</head>
	<body>
		<a href='index.php'>Voltar</a>
		<h3><?php echo $result; ?></h3>
		<?php 
		    // Seleciona todos os usuários
			$sql = mysqli_query($conn, "SELECT * FROM produtos ORDER BY nome");
			// Exibe as informações de cada usuário
			while ($produto = mysqli_fetch_object($sql)) {
				// Exibimos a foto
				echo "<img src='../../img/".$produto->foto."' alt='Foto de exibição' /><br />";
				// Exibimos o nome e email
				echo "<b>Nome:</b> " . $produto->nome . "<br />";
				echo "<b>Descrição:</b> " . $produto->descricao . "<br />";
				echo "<b>Deletar:</b> <a href='deletar.php?id=$produto->id'> aqui </a><br /><br />";

			}
		?>
	</body>
</html>
<?php
}
else{
	header('location: index.php');
}
?>