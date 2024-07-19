<?php

include ('conexao.php');
include ('validacao.php');

//destino do formulário vai para o inserir
$destino = './cardapio/inserir.php';

//se existir algum idAlt
if(!empty($_GET['idAlt'])){
  $id= $_GET['idAlt'];
  $sql = "SELECT * FROM cardapio WHERE id='$id' ";
  $dados = mysqli_query($conexao, $sql);
  $dadosAlteracao = mysqli_fetch_assoc($dados);

  //destino do formulário vai para o alterar.php
  $destino = './cardapio/alterar.php';
}

?>



<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Sistema de Cardápios </title>
  <link rel="stylesheet" href="estilo.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
    integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.dataTables.css" />



</head>

<body>

  <?php include './modulosMenu/menuSuperior.php' ?>
  
  
  
  <div class="container-fluid">
    
    <!-- linha -->
    <div class="row">
      <!-- coluna -->
      <div class="col-md-3 menu">
        <?php include './modulosMenu/menuLateral.php'?>
      </div>
      <div class="col-md-9">

        <div class="row">
          <div class="col-md-4 card">

            <form action="<?=$destino?>" method="POST">
           

              <h3>Cadastro de cardapio</h3>
              <hr>
              <div class="form-group">
                <label> Código </label>
                <input value="<?php echo isset($dadosAlteracao) ? $dadosAlteracao['id'] : '' ?>" type="text" name="id" class="form-control" id="codigo" placeholder="Código">
              </div>

              <label> Escola</label>
              <select name="escola" class="form-control">
                <option value="<?php echo isset($dadosAlteracao) ? $dadosAlteracao['escola'] : '' ?>">
                    <?php
                        //se houver dados de alteração busca o nome da escola
                        if(isset($dadosAlteracao)){
                          $sql = "SELECT * FROM escola WHERE id=".$dadosAlteracao['escola'];
                          $dados = mysqli_query($conexao, $sql);
                          $colunas = mysqli_fetch_assoc($dados);
                          echo $colunas['nome'];
                        // se não tiver dados de alteração, só aparece selecione
                        }else{
                          echo 'Selecione...';
                        }
                    ?> 
                  </option>

                  <?php
                    $sql = 'SELECT * FROM escola';
                    $dados = mysqli_query($conexao, $sql);

                    while($coluna = mysqli_fetch_assoc($dados)){
                      echo "<option value='".$coluna['id']."' >".$coluna['nome']."</option>";
                     }
                  ?>
              </select>

              <div class="form-group">
                <label> Série </label>
                <input value="<?php echo isset($dadosAlteracao) ? $dadosAlteracao['serie'] : '' ?>" type="text" name="serie" class="form-control" id="serie" placeholder="serie">
              </div>

              <div class="form-group">
                <label> Nutricionista </label>
                
                <input title="campo de nutricionista" value="<?php echo isset($dadosAlteracao) ? $dadosAlteracao['nutricionista'] : '' ?>" 
                type="text" name="nutricionista" class="form-control" id="nutricionista" placeholder="nutricionista">
              </div>

              <div class="form-group">
                <label>pdf</label>
                <input type="file" value="<?php echo isset($dadosAlteracao) ? $dadosAlteracao['pdf'] : '' ?>" 
                                    name="pdf" class="form-control pdf" id="pdf" placeholder="pdf">
              </div>

              <button type="submit" class="btn btn-primary">Enviar</button>
            </form>


          </div>

        


          <div class="col-md card">
            <table class="table " id="tabela">
              <thead>
                <tr>
                  <th scope="col" class="col-1">cód</th>
                  <th scope="col"> serie </th>
                  <th scope="col"> Nutricionista </th>
                  <th scope="col"> Escola </th>
                  <th scope="col" class="col-2"> Opções </th>
                </tr>
              </thead>
              <tbody>

                <?php
                  //sql para selecionar todos dadosAlteracao
                  $sql = "SELECT * FROM cardapio";
                  //executa o sql e armazena
                  $resultado = mysqli_query($conexao, $sql);
                  while($coluna = mysqli_fetch_assoc($resultado)){
                ?>
                <tr>
                  <td> <?php echo $coluna['id'] ?> </td>
                  <td> <?php echo $coluna['serie'] ?> </td>
                  <td> <?php echo $coluna['nutricionista'] ?> </td>

                  <td><?php 
                    $sql2 = "SELECT * FROM escola WHERE id=".$coluna['escola'];
                    $dados = mysqli_query($conexao, $sql2);
                    $busca = mysqli_fetch_assoc($dados);
                    echo $busca['nome'] ?> 
                  </td>
                  
                  <td>
                    <a href="cardapio.php?idAlt=<?= $coluna['id'] ?>" title="Editar"> <i class="fa-solid fa-pen-to-square editar"></i> </a>
                    <a href="<?php echo './cardapio/excluir.php?id='.$coluna['id']; ?>" title="Excluir"> <i class="fa-solid fa-trash excluir"></i></a>
                  </td>
                  
                </tr>
                
                <?php } ?>

              </tbody>
            </table>
          </div>


        </div>
      </div>

    </div>

  </div>



  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
    integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
    integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
    crossorigin="anonymous"></script>


  <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <script src="script.js"></script>


</body>

</html>