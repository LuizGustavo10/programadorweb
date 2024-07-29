<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>NutriEscola</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="recursos/paginaInicial.css">
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand" href="#"> <i class="fa-solid fa-building-wheat"></i> NutriEscola</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado"
      aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
      <ul class="navbar-nav mr-auto">

        <li class="nav-item active">
          <a class="nav-link" href="contato.html">Contato </a>
        </li>


      </ul>
      <form class="form-inline my-2 my-lg-0">
        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
        <a href="login.php" class="btn btn-outline-light my-2 my-sm-0 m-2"> <i class="fa-solid fa-right-to-bracket"></i>
          Logar </a>

      </form>
    </div>
  </nav>


  <div class="container">

    <?php
    //importar a conexão
    include 'conexao.php';

    //carrega o id da escola que foi clicada
    $id = $_REQUEST['codigo'];

    //buscar todos os dados da escola de acordo com o código
    $sql = "SELECT * FROM escola WHERE id=" . $id;
    $resultado = mysqli_query($conexao, $sql);
    $coluna = mysqli_fetch_assoc($resultado);
    ?>

    <div class="row"> 
      <div class="col-md-8 mb-3">
        <img width="100%" src="<?php echo $coluna['imagem'] ?>" alt="">
      </div>
      <div class="col-md-4 mb-3">
        <?php echo $coluna['mapa'] ?>
      </div>
    </div>

   

    


    <h1> <?php echo $coluna['nome'] ?> </h1>

    <p>Cidade: 
    <?php
    $sql2 = "SELECT * FROM cidade WHERE id='" . $coluna['cidade'] . "' ";
    $dados = mysqli_query($conexao, $sql2);
    $buscaCidade = mysqli_fetch_assoc($dados);
    echo $buscaCidade['nome'] ?>
    </p>

    <p> Endereço: <?php echo $coluna['endereco'] ?> </p>
    <p> Bairro: <?php  echo $coluna['bairro'] ?> </p>
    <p> Telefone: <?php echo $coluna['telefone'] ?> </p>
    <p> Celular: <?php echo $coluna['celular'] ?> </p>
    <p> Descrição: <?php echo $coluna['descricao'] ?> </p>

    <?php
      //buscar cardapios de acordo com o codigo da escola
      $sql = "SELECT * FROM cardapio WHERE escola=".$coluna['id'];
      $resultado = mysqli_query($conexao, $sql);

      //se o número de resultados for maior que ero
      if($resultado->num_rows > 0){
        //cria looping de acordo com a quantidade de resultados buscados
        while($dados = $resultado -> fetch_assoc()){

    ?>
    <div class="row" mb-4>
      <div class="col">
        <div class="card" style="width: 100%">
          <div class="card-body">
            <h5 class="card-title"> <?php echo $dados['serie'] ?> </h5>
            <p class="card-text"> <?php echo $dados['nutricionista'] ?> </p>

            <?php 
              
              $pdf = $dados['pdf'];
              echo '<a class="btn btn-primary m-1" href="'.$pdf.'" target="_blank"> Ver </a>';
              echo '<a class="btn btn-primary m-1" href="'.$pdf.'" download> Baixar </a>'; 

            ?>

          </div>
        </div>
      </div>
    </div>
  <?php }} ?>
  </div>



  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>
  <script src="recursos/paginaInicial.js"></script>
</body>

</html>