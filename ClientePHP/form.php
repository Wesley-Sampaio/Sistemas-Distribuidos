<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Consumindo WebService</title>
  
  <link rel="stylesheet" href="styles.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

  <script>
    //Função do botão
    function abrir() {
      //funcao do botao listar
      window.location = "http://localhost:9090/ClientePHP/index.php";
    }
  </script>
</head>

<body align="center">

  <form name="postform" id="postform" class="rounded" action="post.php" method="post" enctype="multipart/form-data">
    <h2>Formulário POST</h2>

    <div class="field">
      <label for="nome">Nome:</label>
      <input type="text" class="input" id="nome" name="nome" />
      <p class="hint">Digite o nome.</p>
    </div>

    <div class="field">
      <label for="endereco">Endereco:</label>
      <input type="text" class="input" id="endereco" name="endereco" />
      <p class="hint">Digite o Endereco.</p>
    </div>

    <div class="field">
      <label for="bairro">Bairro:</label>
      <input type="text" class="input" id="bairro" name="bairro" />
      <p class="hint">Digite o Bairro.</p>
    </div>

    <div class="field">
      <label for="numero">Numero:</label>
      <input type="text" class="input" id="numero" name="numero" />
      <p class="hint">Digite o Numero.</p>
    </div>

    <div class="field">
      <label for="complemento">Complemento:</label>
      <input type="text" class="input" id="complemento" name="complemento" />
      <p class="hint">Digite o Complemento.</p>
    </div>

    <div class="field">
      <label for="cidade">Cidade:</label>
      <input type="text" class="input" id="cidade" name="cidade" />
      <p class="hint">Digite o Cidade.</p>
    </div>

    <div class="field">
      <label for="estado">Estado:</label>
      <input type="text" class="input" id="estado" name="estado" />
      <p class="hint">Digite o Estado.</p>
    </div>

    <div class="field">
      <label for="cep">Cep:</label>
      <input type="text" class="input" id="cep" name="cep" />
      <p class="hint">Digite o Cep.</p>
    </div>

    <input type="submit" value="Enviar" class="botao" />
    <input type="reset" value="Limpar" class="botao" />
    <button type="button" onclick="abrir()" class="botao">Listar</button>
  </form>
</body>

</html>
