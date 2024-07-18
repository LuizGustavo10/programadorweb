<?php
include '../conexao.php';
//se existir algum atributo de requisição chamado id
if(isset($_REQUEST['id'])){

    //recebendo dados da tela
    $id = $_REQUEST['id'];

    //receber dados do formulário
    $escola = $_REQUEST['escola'];
    $serie = $_REQUEST['serie'];
    $nutricionista = $_REQUEST['nutricionista'];
    $pdf = $_REQUEST['pdf'];


    $sql = "UPDATE cardapio SET escola='$escola', serie='$serie', nutricionista='$nutricionista', pdf='$pdf' WHERE id='$id' ";

    $resultado = mysqli_query($conexao, $sql);

    header('Location:../cardapio.php');

}
header('Location:../cardapio.php');

?>