<?php
session_start();

if(isset($_SESSION['user'])) 
{
	include "../../conexao.php";
	// Seleciona todos os usuários
	$sql = mysqli_query($conn,"SELECT * FROM produtos ORDER BY nome");

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
		<div id="bordaarredondada">
			<div class='titulo1'>Nome do E-commerce</div>
			<div class='descricao1'>Descrição e-commerce</div>
			<div class='boxStatic'>
				<div class='imagemIconeEsquerda'>Icon</div>
				<div class='titulo4'>Carrinho de Compras</div>
				<div class='descricao4'><span class='textoVermelho'>10</span> produtos no carrinho</div>
			</div> 
			<hr>
			<?php 
				// Exibe as informações de cada usuário
				while ($produto = mysqli_fetch_object($sql)) {
			?>
			<div class='listaGrande'>
				<div id="bordaarredondada">
					<a href="produto.html?id=1">
			            <div class='imagem'>
			            	<img src='../../img/<?php echo $produto->foto; ?>' alt='Foto de exibição' />
			            </div>
			            <div class='nomeprd'><?php echo $produto->nome; ?></div>
			            <div class='nomeprd'><?php echo substr($produto->descricao,0,16)."..."; ?></div>
		        	</a>
		            <div>
			            <div class='listaMedia'><div class='imagemIconeEsquerda'>Icon</div></div>
			            <div class='listaMedia'><div class='imagemIconeEsquerda'>Icon</div></div>
			            <div class='listaMedia'><div class='imagemIconeEsquerda'>Icon</div></div>
			            <div class='listaMedia'><div class='imagemIconeEsquerda'>Icon</div></div>
		         	</div>
		         	<div class='limpa'></div>
				</div>
			</div>
			<?php } ?>
			<div class='limpa'></div>
			<hr>
			<div class='titulo3 textoCentro'>Contato e-commerce (55) 35 9 8888-8888</div>
		</div>
	</body>
</html>
<?php
}
else{
	header('location: index.php');
}
?>