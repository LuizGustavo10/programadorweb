<?php
include('../conexao.php');

//receber dados do formulário
$nome = $_REQUEST['nome'];
$endereco = $_REQUEST['endereco'];
$bairro = $_REQUEST['bairro'];
$telefone = $_REQUEST['telefone'];
$celular = $_REQUEST['celular'];
$descricao = $_REQUEST['descricao'];
$imagem = $_REQUEST['imagem'];
$cidade = $_REQUEST['cidade'];


// Pasta de destino para uploads (usando caminho relativo)
$imagemBanco = "./imgs/";

// Caminho absoluto para a pasta de upload
$pasta_img = realpath("../imgs") . "/";

// Verificar se a pasta de destino existe, se não, criar
if (!is_dir($pasta_img)) {
    mkdir($pasta_img, 0777, true);
}

$target_file = $pasta_img . basename($_FILES["imagem"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verificar se o arquivo é uma imagem real
$check = getimagesize($_FILES["imagem"]["tmp_name"]);
if($check === false) {
    die("O arquivo não é uma imagem.");
}

// Verificar se o arquivo já existe
if (file_exists($target_file)) {
    die("Desculpe, o arquivo já existe.");
}

// Verificar o tamanho do arquivo
if ($_FILES["imagem"]["size"] > 500000) {
    die("Desculpe, o arquivo é muito grande.");
}

// Permitir certos formatos de arquivo
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    die("Desculpe, apenas arquivos JPG, JPEG, PNG & GIF são permitidos.");
}

// Tentar fazer o upload do arquivo
if (!move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_file)) {
    die("Desculpe, ocorreu um erro ao fazer o upload do seu arquivo.");
}

// Caminho relativo para salvar no banco de dados
$relative_target_file = $imagemBanco . basename($_FILES["imagem"]["name"]);


//echo 'dados chegando'.$nome.$cpf.$senha;

$sql = "INSERT INTO escola(nome, endereco, bairro, telefone, celular, descricao, imagem, cidade) 
VALUES ('$nome','$endereco', '$bairro','$telefone','$celular', '$descricao', '$relative_target_file', '$cidade')";

//executar sql
$resultado = mysqli_query($conexao, $sql);

//mandar a pessoa para a pagina inicial
header("Location:../escola.php");

?>

