<?php
include '../conexao.php';

$id = $_REQUEST['id'];

//exclui usuario aonde o id for igual a ?
$sql = "DELETE FROM cardapio WHERE id='$id' ";
//executa sql
$resultado = mysqli_query($conexao, $sql);

//direciona a pessoa para a pagina principal
header("Location:../cardapio.php");

?>