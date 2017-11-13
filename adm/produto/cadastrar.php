<?php
session_start();

if(isset($_SESSION['user'])) 
{
	include "../../conexao.php";

	// Se o usuário clicou no botão cadastrar efetua as ações
	if (isset($_POST['cadastrar'])) {
		
		// Recupera os dados do formulário
		$nome      = $_POST['nome'];
		$descricao = $_POST['descricao'];
		$valor     = $_POST['valor'];
		$estrelas  = $_POST["estrelas"];
		$foto      = $_FILES["foto"];

	
		// Se a foto foi selecionada
		if (!empty($foto["name"])) {
			
			// Largura máxima em pixels
			$largura = 10150;
			// Altura máxima em pixels
			$altura = 10180;
			// Tamanho máximo do arquivo em bytes
			$tamanho = 100000;

			$error = array(); //retorno do processo

	    	// Verifica se o arquivo é uma imagem
	    	if(!preg_match("/^image\/(pjpeg|jpeg|png|gif|bmp)$/", $foto["type"])){
	     	   $error[1] = "Isso não é uma imagem.";
	   	 	} 
		
			// Pega as dimensões da imagem
			$dimensoes = getimagesize($foto["tmp_name"]);
		
			// Verifica se a largura da imagem é maior que a largura permitida
			if($dimensoes[0] > $largura) {
				$error[2] = "A largura da imagem não deve ultrapassar ".$largura." pixels";
			}

			// Verifica se a altura da imagem é maior que a altura permitida
			if($dimensoes[1] > $altura) {
				$error[3] = "Altura da imagem não deve ultrapassar ".$altura." pixels";
			}
			
			// Verifica se o tamanho da imagem é maior que o tamanho permitido
			if($foto["size"] > $tamanho) {
	   		 	$error[4] = "A imagem deve ter no máximo ".$tamanho." bytes";
			}

			// Se não houver nenhum erro
			if (count($error) == 0) {
			
				// Pega extensão da imagem
				preg_match("/\.(gif|bmp|png|jpg|jpeg){1}$/i", $foto["name"], $ext);

	        	// Gera um nome único para a imagem
	        	$nome_imagem = md5(uniqid(time())) . "." . $ext[1];

	        	// Caminho de onde ficará a imagem
	        	$caminho_imagem = "../../img/" . $nome_imagem;

				// Faz o upload da imagem para seu respectivo caminho
				move_uploaded_file($foto["tmp_name"], $caminho_imagem);
		
				// Insere os dados no banco
				mysqli_query($conn, "INSERT INTO produtos VALUES (NULL, '".$nome."', '".$descricao."', ".$valor.", '".$nome_imagem."', ".$estrelas.")");
			    if(mysqli_affected_rows($conn)){
					// Se os dados forem inseridos com sucesso
					$mens = base64_encode(json_encode(array('Produto inserido!')));
					header("location: index.php?ms=$mens");
					exit;
				}else{
					$error[5] = "impossível inserir!";
				}
			}
			// Se houver mensagens de erro, exibe-as
			$mens = base64_encode(json_encode($error));

			header("location: index.php?ms=$mens");
		}
	}
}
else{
	header('location: index.php');
}
?>