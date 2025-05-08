<h1>Cadastro de produtos</h1>
<form action="cadastrar_action.php" method="POST">
  <label for="nome">Nome do produto:</label>
  <br>
  <input type="text" name="nome">
  <br>
  <label for="qtd">Quantidade:</label>
  <br>
  <input type="number" name="qtd">
  <br>
  <label for="preco_venda">Preço de venda:</label>
  <br>
  <input type="number" name="preco_venda" step="0.01">
  <br>
  <label for="preco_custo">Preço de custo:</label>
  <br>
  <input type="number" name="preco_custo" step="0.01">
  <br><br>
  <input type="submit" value="Confirmar">
  <p><a href="index.php">Voltar</a></p>
</form>

<style>
body {
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}

form {
  border: 1px solid rgba(0, 0, 0, 0.3);
  padding: 10px;
  border-radius: 10px;
  box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.5);
  width: 275px;
}

p {
  text-align: center;
  margin: 10px 0 0 0;
}

input {
  width: 100%;
  padding: 5px;
  font-size: 1rem;
}

label {
  font-weight: bold;
  margin-top: 10px;
}

input[type="submit"] {
  border: none;
  border-radius: 10px;
  background-color: gray;
  font-weight: bold;

}
</style>