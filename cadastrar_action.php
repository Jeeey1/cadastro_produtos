<?php
require 'config.php';
require 'dao/ProdutoDaoMysql.php';
$produtoDao = new ProdutoDAOMysql($pdo);

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$qtd = filter_input(INPUT_POST, 'qtd', FILTER_SANITIZE_NUMBER_INT);
$preco_venda = filter_input(INPUT_POST, 'preco_venda');
$preco_custo = filter_input(INPUT_POST, 'preco_custo');

if($nome && $qtd && $preco_venda && $preco_custo){
  if($produtoDao->findByName($nome) === false){
    $p = new Produto;
    $p->setNome($nome);
    $p->setQtd($qtd);
    $p->setPrecoVenda($preco_venda);
    $p->setPrecoCusto($preco_custo);
    $p->setMLUnidade();
    $p->setMLTotal();
    
    $produtoDao->add($p);

    header('location: index.php');
    exit;
    
  } else {
    header('location: cadastrar.php');
    exit;
  }
}
?>