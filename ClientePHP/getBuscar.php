<html>
    <head>
        <title>Consumindo WebService</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    <script> //Função do botão
        function abrir(){ //funcao do botao listar
            window.location = "http://localhost:9090/ClientePHP/index.php"
        };
        
        function cadastrar() {
                window.location = "http://localhost:9090/ClientePHP/form.php"
            }
    </script>
    
    
    </head>
<body>
    <h1>Buscar Hoteis</h1>

    <form name="postform" id="postform" class="rounded">
    
    <h2>Buscar GET (Não implementado)</h2>
    
    <div class="field">
        <label for="id">id:</label>
        <input type="text" class="input" id="id" name="id"/>
        <p class="hint">Digite o id.</p>
    </div>  
    
    <div class="field">
        <label for="datainicial">data inicial:</label>
        <input type="date" class="input" id="datainicial" name="datainicial" />
        <p class="hint">Digite o data inicial.</p>
        <link href="css/styles.css" rel="stylesheet" type="text/css"/>
    </div>
    
    <div class="field">
        <label for="datafinal">data final:</label>
        <input type="date" class="input" id="datafinal" name="datafinal" />
        <p class="hint">Digite o data final.</p>
        
    </div>
  
        <input  value="buscar" class="botao"/>
        <button type="button" onclick="abrir()" class="botao" style="width: 110px; float: none;" >Listar</button>
        <button type="button" onclick="cadastrar()" class="botao" style="width: 110px; float: none;" >Cadastrar</button>
    </form>
    
    
    
</body>
</html>