<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Consumindo WebService</title>

  <link rel="stylesheet" href="styles.css" />

  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />

  <script> //Função do botão
    function abrir() { //funcao do botao listar
      window.location = "http://localhost:9090/ClientePHP/index.php"
    };

    function cadastrar() {
      window.location = "http://localhost:9090/ClientePHP/form.php"
    }
  </script>
</head>

<body align="center">
  

  <form name="postform" id="postform" class="rounded" method="post" enctype="multipart/form-data">

    <h2>Buscar GET (Não implementado)</h2>
    
    

    <div class="field">
      <label for="id">id:</label>
      <input type="text" class="input" id="id" name="id" />
      <p class="hint">Digite o id.</p>
    </div>

    <div class="field">
      <label for="datainicial">data inicial:</label>
      <input type="date" class="input" id="datainicial" name="datainicial" />
      <p class="hint">Digite o data inicial.</p>

    </div>

    <div class="field">
      <label for="datafinal">data final:</label>
      <input type="date" class="input" id="datafinal" name="datafinal" />
      <p class="hint">Digite o data final.</p>

    </div>

   
    <input type="submit" value="buscar" class="botao"/>
    <button type="button" onclick="abrir()" class="botao">Listar</button>
    <button type="button" onclick="cadastrar()" class="botao">Cadastrar</button>
    
  </form>



</body>

</html>
