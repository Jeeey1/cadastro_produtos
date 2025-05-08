<?php 
  require 'config.php';
  require 'dao/ProdutoDaoMysql.php';
  $produtoDao = new ProdutoDAOMysql($pdo);

  $id = filter_input(INPUT_GET, 'id');
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
  $qtd = filter_input(INPUT_POST, 'qtd');
  $preco_venda = filter_input(INPUT_POST, 'preco_venda');
  $preco_custo = filter_input(INPUT_POST, 'preco_custo');

  if($id && $nome && $qtd && $preco_venda && $preco_custo){
    $p = new Produto();
    $p->setId($id);
    $p->setNome($nome);
    $p->setQtd($qtd);
    $p->setPrecoVenda($preco_venda);
    $p->setPrecoCusto($preco_custo);

    $produtoDao->update($p);
    header('location: index.php');
    exit;
  } else {
    var_dump($id, $nome, $qtd, $preco_venda, $preco_custo);
  }
?>