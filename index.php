<?php
    include "conexao.php";

    //selecionar produtos
    $sqlProd = mysqli_query($conn,'Select * from produtos');
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Template simples E-commerce</title>
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
		<!-- Fontss -->
		<link rel="stylesheet" href="less/font-awesome.min.css">
		<!-- Importar arquivo LESS-->
		<link rel="stylesheet/less" type="text/css" href="less/style.less" />
		<!-- Incluir script de execução CDN -->
		<script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.7.2/less.min.js"></script>
		<!-- Importar arquivo CSS-->
		<link rel="stylesheet" type="text/css" href="less/style.css" />
	</head>
	<body>
		<div id="bordaarredondada">
			<div class='titulo1'>Power Compras</div>
			<div class='descricao1'>E-commerce feito para você.</div>
			<div class='boxStatic'>
				<div class='imagemIconeEsquerda'>  <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> </div>
				<div class='titulo4'>Carrinho de Compras</div>
				<div class='descricao4'><span class='textoVermelho'>10</span> produtos no carrinho</div>
			</div> 
			<hr>
			<?php 
				while($prd = mysqli_fetch_object($sqlProd)):
			?>
				<div class='listaGrande'>
					<div id="bordaarredondada">
						<a href="produto.html?id=1">
				            <div class='imagem'> <img src='img/<?php echo $prd->foto ?>' title=''> </div>
				            <div class='nomeprd'> <?php echo $prd->nome ?> </div>
				            <div class='nomeprd'> <?php echo $prd->descricao ?> </div>
			        	</a>
			            <div>
			            	<?php
			            	    //loop para estrelas
			            		for($i=1 ; $i <= 4 ; $i++) {
			            			$estrela = '<div class="listaMedia"> <i class="fa fa-star fa-2x" aria-hidden="true"></i></div>';
			            			if($i <= $prd->estrelas)
			            				echo "<span class='textoAmarelo'> $estrela </span>";
			            			else
			            				echo "<span class='textoCinza'> $estrela </span>"; 
			            		}
			            	?>
			         	</div>
			         	<div class='limpa'></div>
					</div>
				</div>
			<?php
				endwhile;
			?>
			
			<div class='limpa'></div>
			<hr>
			<div class='titulo3 textoCentro'>Contato e-commerce (55) 35 9 8888-8888</div>


		</div>
		
	</body>
</html>

