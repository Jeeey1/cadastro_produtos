<?php 
require 'config.php';
require 'dao/ProdutoDaoMysql.php';

$produtoDao = new ProdutoDAOMysql($pdo);
$lista = $produtoDao->findAll();

?>

<style>
h1 {
  text-align: center;
  margin: 0px;
}


table {
  border: 2px solid gray;

  tr {
    border: 2px solid gray;
    text-align: center;
  }

  td {
    padding: 5px;
    border: 1px solid black;
  }

  .colunas td {
    font-weight: bold;
    padding: 0px;
  }
}

div {
  display: grid;
  justify-items: center;
}

div a {
  border: 1px solid black;
  padding: 5px 10px;
  border-radius: 10px;
  background-color: aliceblue;
  font-weight: bold;
  color: black;
  margin: 10px 0 10px 0;
}
</style>
<h1>TABELA DE ESTOQUE</h1>
<div><a href="cadastrar.php">CADASTRAR NOVO PRODUTO</a></div>
<table width="100%">
  <tr class="colunas">
    <td>ID</td>
    <td>PRODUTOS</td>
    <td>QUANTIDADE EM ESTOQUE</td>
    <td>PREÇO DE VENDA</td>
    <td>PREÇO DE CUSTO</td>
    <td>MARGEM DE LUCRO POR UN.</td>
    <td>MARGEM DE LUCRO TOTAL</td>
    <td>AÇÕES</td>
  </tr>
  <?php foreach($lista as $item):?>
  <tr>
    <td><?=$item->getId();?></td>
    <td><?=$item->getNome();?></td>
    <td><?=$item->getQtd();?></td>
    <td><?="R$ ".number_format($item->getPrecoVenda(), 2);?></td>
    <td><?="R$ ".number_format($item->getPrecoCusto(), 2);?></td>
    <td><?="R$ ".number_format($item->getMLUnidade(), 2);?></td>
    <td><?="R$ ".number_format($item->getMLTotal(), 2);?></td>
    <td>
      <a href="editar.php?id=<?=$item->getId()?>">[ EDITAR ]</a>
      <a href="excluir.php?id=<?=$item->getId();?>" onclick="confirm('Deseja realmente excluir esse registro?')">[
        EXCLUIR ]</a>
    </td>
  </tr>
  <?php endforeach;?>
</table>