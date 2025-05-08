<?php 
  require 'config.php';
  require 'dao/ProdutoDaoMysql.php';
  $produtoDao = new ProdutoDAOMysql($pdo);

  $id = filter_input(INPUT_GET, 'id');

  if($produtoDao->findById($id) !== false){
    $produtoDao->delete($id);
  }

  header('location: index.php');
  exit;
?>