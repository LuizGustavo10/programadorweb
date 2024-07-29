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

    $sql = "UPDATE cardapio SET escola='$escola', serie='$serie', nutricionista='$nutricionista', pdf='$pdfPath' WHERE id='$id' ";

    $resultado = mysqli_query($conexao, $sql);

    header('Location:../cardapio.php');

}
header('Location:../cardapio.php');

?>