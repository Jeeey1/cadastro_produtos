<?php 
require_once 'model/Produto.php';

class ProdutoDAOMysql implements ProdutoDAO{
  private $pdo;

  public function __construct(PDO $driver){
    $this->pdo = $driver;
  }

  public function add(Produto $p){
    $sql = $this->pdo->prepare("INSERT INTO produtos (nome, qtd, preco_venda, custo, ml_uni, ml_total) VALUES (:nome, :qtd, :preco_venda, :custo, :ml_un, :ml_t)");
    $sql->bindValue(':nome', $p->getNome());
    $sql->bindValue(':qtd', $p->getQtd());
    $sql->bindValue(':preco_venda', $p->getPrecoVenda());
    $sql->bindValue(':custo', $p->getPrecoCusto());
    $sql->bindValue(':ml_un', $p->getMLUnidade());
    $sql->bindValue(':ml_t', $p->getMLTotal());
    $sql->execute();
    $p->setId($this->pdo->lastInsertId());
    
    return $p;
  }

  public function findAll(){
    $produto = [];
    $sql = $this->pdo->query("SELECT * FROM produtos");
    
    if($sql->rowCount() > 0){
      $info = $sql->fetchAll();

      foreach($info as $item){
        $p = new Produto;
        $p->setId($item['id']);
        $p->setNome($item['nome']);
        $p->setQtd($item['qtd']);
        $p->setPrecoVenda(($item['preco_venda']));
        $p->setPrecoCusto($item['custo']);
        $p->setMLUnidade();
        $p->setMLTotal();
        $p->getMLUnidade($item['ml_uni']);
        $p->getMLTotal($item['ml_total']);

        $produto[] = $p;
      }
    }
    return $produto;
  }
  public function findById($id){
    $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
      $data = $sql->fetch();

      $p = new Produto();
      $p->setId($data['id']);
      $p->setNome($data['nome']);
      $p->setQtd($data['qtd']);
      $p->setPrecoVenda($data['preco_venda']);
      $p->setPrecoCusto($data['custo']);
      return $p;
    } else {
      return false;
    }
  }

  public function findByName($nome){
    $sql = $this->pdo->prepare("SELECT * FROM produtos WHERE nome = :nome");
    $sql->bindValue(':nome', $nome);
    $sql->execute();

    if($sql->rowCount() > 0){
      $data = $sql->fetch();

      $p = new Produto();
      $p->setId($data['id']);
      $p->setNome($data['nome']);
      $p->setQtd($data['qtd']);
      $p->setPrecoVenda($data['preco_venda']);
      $p->setPrecoCusto($data['custo']);
      return $p;
    } else {
      return false;
    }
  }
  
  public function update(Produto $p){
    $sql = $this->pdo->prepare("UPDATE produtos SET nome = :nome, qtd = :qtd, preco_venda = :preco_venda, custo = :custo WHERE id = :id");
    $sql->bindValue(':id', $p->getId());
    $sql->bindValue(':nome', $p->getNome());
    $sql->bindValue(':qtd', $p->getQtd());
    $sql->bindValue(':preco_venda', $p->getPrecoVenda());
    $sql->bindValue(':custo', $p->getPrecoCusto());
    $sql->execute();

    return true;
  }
  
  public function delete($id){
    $sql = $this->pdo->prepare("DELETE FROM produtos WHERE id = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    return true;
  }
}
?>