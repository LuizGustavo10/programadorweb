<?php
include('../conexao.php');

//receber dados do formulário
$escola = $_REQUEST['escola'];
$serie = $_REQUEST['serie'];
$nutricionista = $_REQUEST['nutricionista'];
$pdf = $_REQUEST['pdf'];

// Diretório de upload
$uploadDir = 'pdfs/';
$uploadDir2 = '../pdfs/';

// Verifica se o diretório existe, caso contrário, cria o diretório
if (!is_dir($uploadDir2)) {
    mkdir($uploadDir2, 0777, true);
}

$uploadFile = $uploadDir2 . basename($_FILES['pdf']['name']);
$uploadFile2 = $uploadDir . basename($_FILES['pdf']['name']);
$pdfPath = '';

if (move_uploaded_file($_FILES['pdf']['tmp_name'], $uploadFile)) {
    $pdfPath = $uploadFile2; // Caminho relativo para armazenar no banco de dados
} else {
    echo "Erro ao fazer upload do arquivo.\n";
    exit;
}

//echo 'dados chegando'.$nome.$cpf.$senha;
$sql = "INSERT INTO cardapio(escola, serie, nutricionista, pdf) VALUES ('$escola','$serie','$nutricionista','$pdfPath')";

//executar sql
$resultado = mysqli_query($conexao, $sql);

//mandar a pessoa para a pagina inicial
header("Location:../cardapio.php");

?>

