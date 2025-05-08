<?php 
class Produto{
  private $id;
  private $nome;
  private $qtd;
  private $preco_venda;
  private $preco_custo;
  private $ml_un;
  private $ml_t;

  public function getId(){
    return $this->id;
  }

  public function setId($id){
    $this->id = $id;
  }

  public function getNome(){
    return ucwords($this->nome);
  }

  public function setNome($nome){
    $nome = strtolower(str_replace("-", " ", $nome));
    $this->nome = $nome;
  }

  public function getQtd(){
    return $this->qtd;
  }

  public function setQtd($qtd){
    $this->qtd = $qtd;
  }

  public function getPrecoVenda(){
    return $this->preco_venda;
  }

  public function setPrecoVenda($preco_venda){
    $this->preco_venda = $preco_venda;
  }

  public function getPrecoCusto(){
    return $this->preco_custo;
  }

  public function setPrecoCusto($preco_custo){
    $this->preco_custo = $preco_custo;
  }

  public function getMLUnidade(){
    if($this->ml_un)
    return $this->ml_un;
    else
    var_dump($this->ml_un);
  }

  public function setMLUnidade(){
    if($this->preco_venda && $this->preco_custo)
    $this->ml_un = ($this->preco_venda - $this->preco_custo);
  }

  public function getMLTotal(){
    if($this->ml_t)
    return $this->ml_t;
    else
    return var_dump($this->ml_t);
  }

  public function setMLTotal(){
    if($this->qtd && $this->ml_un)
    $this->ml_t = ($this->qtd * $this->ml_un);
  }
}

interface ProdutoDAO {
  public function add(Produto $p);
  public function findAll();
  public function findById($id);
  public function findByName($nome);
  public function update(Produto $p);
  public function delete($id);
}

?>