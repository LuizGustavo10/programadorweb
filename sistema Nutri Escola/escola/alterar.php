<?php
include '../conexao.php';
//se existir algum atributo de requisição chamado id
if(isset($_REQUEST['id'])){

    //recebendo dados da tela
    $id = $_REQUEST['id'];
   //receber dados do formulário
    $nome = $_REQUEST['nome'];
    $endereco = $_REQUEST['endereco'];
    $bairro = $_REQUEST['bairro'];

    $telefone = $_REQUEST['telefone'];
    $celular = $_REQUEST['celular'];
    $descricao = $_REQUEST['descricao'];
    $imagem = $_REQUEST['imagem'];
    $cidade = $_REQUEST['cidade'];

    $sql = "UPDATE escola SET nome='$nome', endereco='$endereco', bairro='$bairro', telefone='$telefone', celular='$celular', descricao='$descricao', imagem='$imagem', cidade='$cidade' WHERE id='$id' ";

    $resultado = mysqli_query($conexao, $sql);

    header('Location:../escola.php');

}
header('Location:../escola.php');

?>