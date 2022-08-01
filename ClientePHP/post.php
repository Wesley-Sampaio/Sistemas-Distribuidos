<?php
// Recebe o endereco do POST hotel
//Checa que o formulário foi enviado
if (!empty($_POST)) {
    //Cria a array com os dados recebido, sendo q o ID é gerado pelo WS
    $postArray = array(
        "nome" => $_POST['nome'],
        "endereco" => $_POST['endereco'],
        "bairro" => $_POST['bairro'],
        "numero" => $_POST['numero'],
        "complemento" => $_POST['complemento'],
        "cidade" => $_POST['cidade'],
        "estado" => $_POST['estado'],
        "cep" => $_POST['cep'],
    );
// Converte os dados para o formato jSon
    $json = json_encode($postArray);
};

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
    CURLOPT_CUSTOMREQUEST => "POST", //metodo
    CURLOPT_POSTFIELDS => $json, //string com dados à serem postados      
    CURLOPT_HTTPHEADER => array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json)),
));
$result = curl_exec($curl); //recebe o resultado
$err = curl_error($curl); //recebe o erro da classe ou WS

curl_close($curl); //Encerra a biblioteca

if ($err) {
    ?>

    <script type="text/javascript"> //apresenta o erro
        alert("<?php echo $err; ?>");
        window.location.href = "http://localhost:9090/ClientePHP/index.php";
                </script>

    <?php
} else {    //valadia a condição, tendo erro, alerta o erro, ou segue para o resultado vindo do WS
    ?>

        <script
        type = "text/javascript" > //apresenta o resultado
                alert("<?php echo $result; ?>");
        window.location.href = "http://localhost:9090/ClientePHP/index.php";
    </script>
    <?php
}//encerra else
?>