<html lang="pt_BR">

    <head>

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="text/html" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Consumindo WebService</title>

        <link rel="stylesheet" href="css/styles.css" type="text/css"/> 

        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
            rel="stylesheet"
            />


        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/jquery.tablesorter.js" type="text/javascript"></script>

        <script type="text/javascript">

            //Chama a função tablesorter, plugin do jQuery
            $(function () {
                $("#hoteis").tablesorter({
                    debug: true
                });
            });
            //Alerta de exclusão  
            function excluir(id) {
                if (confirm("Deseja excluir?"))
                    window.location = "http://localhost:9090/ClientePHP/index.php?action=del_id&id=" + id;
            }
            ;
            //Função do botão
            function abrir() {
                window.location = "http://localhost:9090/ClientePHP/form.php"
            }

            //Função do botão
            function buscar() {
                window.location = "http://localhost:9090/ClientePHP/getBuscar.php"
            }
            ;

        </script>

    </head>

    <body align="center">

        <?php
//trata a URL, se possui action e id, executa exclusao, caso contrario trata o GET da lista
        if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] == "del_id") {
//Recupera o ID do GET da página    
            $iddel = $_GET["id"];
//Inicia a biblioteca cURL do PHP
            $curl = curl_init();

            curl_setopt_array($curl, array(
                CURLOPT_PORT => "8080", //porta do WS
                CURLOPT_URL => "http://localhost:8080/WEB-INF/hoteis/" . $iddel, //Caminho do WS + string do DELETE, recuperado pelo GET
                CURLOPT_RETURNTRANSFER => true, //Recebe resposta
                CURLOPT_ENCODING => "", //Decodificação
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "DELETE", //metodo
                CURLOPT_HTTPHEADER => array(
                    "cache-control: no-cache",
                ),
            ));

            $response = curl_exec($curl); //recebe a resposta do WS
            $err = curl_error($curl); //recebe o erro da classe ou WS

            curl_close($curl); //encerra classe

            if ($err) {
                ?>
                <script type="text/javascript"> //apresenta o erro
                    alert("<?php echo $err; ?>");
                    window.location.href = "http://localhost:9090/ClientePHP/index.php";
                            < /script >
        <?php
    } else {    //caso contratio
        ?>

                    <h1>Hoteis</h1>

        <?php
    }
    ?>

                <script type="text/javascript"> //apresenta a resposta
                        alert("<?php echo $response; ?>");
                window.location.href = "http://localhost:9090/ClientePHP/index.php";
            </script> 

            <?php
        } else {     //Caso não tenha os GETs na URL da pagina, trata o GET da lista do WS
            ?>

            <h1>Hoteis</h1>
            <table id="hoteis" align="center">

                <caption><h2>Lista GET</h2></caption> 

                <thead>
                    <tr>

                        <th>id</th>
                        <th>Nome</th>
                        <th>Endereco</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    <?php
                    //Inicia a biblioteca cURL do PHP
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                        CURLOPT_PORT => "8080", //porta do WS
                        CURLOPT_URL => "http://localhost:8080/WEB-INF/hoteis", //Caminho do WS que vai receber o GET
                        CURLOPT_RETURNTRANSFER => true, //Recebe resposta
                        CURLOPT_ENCODING => "JSON", //Decodificação
                        CURLOPT_MAXREDIRS => 10,
                        CURLOPT_TIMEOUT => 30,
                        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                        CURLOPT_CUSTOMREQUEST => "GET", //metodo do servidor
                        CURLOPT_HTTPHEADER => array(
                            "cache-control: no-cache",
                        ),
                    )); //recebe retorno
                    $data1 = curl_exec($curl); //Recebe a lista no formato jSon do WS
                    curl_close($curl); //Encerra a biblioteca
                    $data = json_decode($data1); //Decodifica o retorno gerado no modelo jSon
//$hoteis = $data->hotel; função de selecionar o obejto nao suportada pelo POST do WS
                    foreach ($data as $c) { //cria a classe de tratamento
                        //Define as arrays
                        $id = $c->id;
                        $nome = $c->nome;
                        $endereco = $c->endereco;
                        ?>

                        <tr id="<?php echo $id; /* pubica as informações na tabela> */ ?>">   

                            <td width="30px"><?php echo $id; ?></td>
                            <td width="100px"><?php echo $nome; ?></td>
                            <td align="right" width="200px"><?php echo $endereco; ?></td>
                            <td align="center" width="30px"> <?php echo "<a href='#' onclick=excluir(\"$id\")"; /* chama o script da exclusão, para o id da linha */ ?> 
                                title= "Excluir <?php echo $nome; ?>"><img width="15px" height="15px"src="css/lixeira.gif" id="X">
                                </a>
                            </td>
                        </tr>

                        <?php
                    }//encerra PHP do tratamento da lista
                    ?>

                </tbody>

                <?php
            }//encerra PHP else
            ?>   

            <tr  style="background-color: f1f1f1">
                <td colspan="4" align="center">
                    <button type="button" onclick="abrir()" class="botao" style="width: 110px; float: none;" >Cadastrar</button>
                    <button type="button" onclick="buscar()" class="botao" style="width: 110px; float: none;" >Buscar</button>
                </td>
            </tr>



        </table>

    </body>

</html>