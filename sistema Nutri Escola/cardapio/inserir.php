<?php
include('../conexao.php');

//receber dados do formulário
$escola = $_REQUEST['escola'];
$serie = $_REQUEST['serie'];
$nutricionista = $_REQUEST['nutricionista'];
$pdf = $_REQUEST['pdf'];

//echo 'dados chegando'.$nome.$cpf.$senha;
$sql = "INSERT INTO cardapio(escola, serie, nutricionista, pdf) VALUES ('$escola','$serie','$nutricionista','$pdf')";

//executar sql
$resultado = mysqli_query($conexao, $sql);

//mandar a pessoa para a pagina inicial
header("Location:../cardapio.php");

?>

