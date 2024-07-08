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

//echo 'dados chegando'.$nome.$cpf.$senha;

$sql = "INSERT INTO escola(nome, endereco, bairro, telefone, celular, descricao, imagem, cidade) 
VALUES ('$nome','$endereco', '$bairro','$telefone','$celular', '$descricao', '$imagem', '$cidade')";

//executar sql
$resultado = mysqli_query($conexao, $sql);

//mandar a pessoa para a pagina inicial
header("Location:../escola.php");

?>

