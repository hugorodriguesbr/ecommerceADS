<?php
  session_start();
  $produto = array('');

  unset($_SESSION['cliente']);

  if(isset($_POST['btn_comprar'])){
      /* TODO  SALVAR PEDIDO */

      //var_dump($_POST);
      /*verificar se está logado*/
      if(isset($_SESSION['cliente'])){
        /*Vou criar a sessao com o produto selecionado*/
      }else{
        unset($_POST['btn_comprar']);
        $_SESSION['pedido'] = array($_POST);
        header('Location: adm/pedido/index.php');
      }
  }


  if(isset($_GET['id'])){
    include "conexao.php";
    //selecionar prodto específico
    $idprd = $_GET['id'];
    $sqlProd = mysqli_query($conn,"Select * from produtos where id=$idprd");

    $produto = mysqli_fetch_object($sqlProd);
  }
  else
  {
    header('Location: index.php');
    exit;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>Comprar</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
<body>
  <div id="bordaarredondada">
      <div class='titulo1'>Power Compras</div>
      <div class='descricao1'>E-commerce feito para você.</div>
      <div class='boxStatic'>
        <a href='adm/pedido/index.php'>
          <div class='imagemIconeEsquerda'>  <i class="fa fa-shopping-cart fa-2x" aria-hidden="true"></i> </div>
          <div class='titulo4'>Carrinho de Compras</div>
          <div class='descricao4'><span class='textoVermelho'>10</span> produtos no carrinho</div>
        </a>
      </div> 
      <hr>
      <div>
    <!-- form comprar -->
    <form name='comprar' action='' method='POST' >
      <input type='hidden' name='idproduto' value='<?php echo $produto->id ?>'> 
      <input type='hidden' name='valor' value='<?php echo $produto->valor ?>'> 
      <div class="row">
         <div class="col-7">
            <div class='imgmaior'>
               <img src="img/<?php echo $produto->foto ?>" />
            </div>
         </div>
         <div class="col-5">
            <h1><?php echo $produto->nome ?></h1>
            <div class="row ">
                <div class="col">
                     <h2>Descrição</h2>
                     <h3> <?php echo $produto->descricao ?></h3>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <select name='quantidade'>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col">
                   <?php echo 'R$ ' . $produto->valor ?>
                </div>
            </div>
             <div class="row">
                <div class="col">
                    <?php
                          //loop para estrelas
                        for($i=1 ; $i <= 4 ; $i++) {
                          $estrela = '<div class="listaMedia"> <i class="fa fa-star fa-2x" aria-hidden="true"></i></div>';
                          if($i <= $produto->estrelas)
                            echo "<span class='textoAmarelo'> $estrela </span>";
                          else
                            echo "<span class='textoCinza'> $estrela </span>"; 
                        }
                      ?>
                      <div class='limpa'></div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                  <input type='submit' name='btn_comprar' value='Comprar'/>
                </div>
            </div>
          </div>
      </div>
    </form>
    <!-- fim form comprar -->
    </div>
    <br>
    <hr>
    <div>
       <?php  //selecionar produtos
          $sqlProd = mysqli_query($conn,'Select * from produtos LIMIT 10');
       ?>
        <?php 
          while($prd = mysqli_fetch_object($sqlProd)):
        ?>
          <div class='listaGrande'>
            <div id="bordaarredondada">
              <a href="produto.php?id=<?php echo $prd->id ?>">
                <div class='imagempequena'> <img src='img/<?php echo $prd->foto ?>' title=''> </div>
                <div class='nomeprd'> <?php echo $prd->nome ?> </div>
              </a>
            </div>
          </div>
        <?php
          endwhile;
        ?>
        <div class='limpa'></div>
    </div>
  </div>
  <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>
