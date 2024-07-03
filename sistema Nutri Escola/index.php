<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriEscola</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="recursos/paginaInicial.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#"> <i class="fa-solid fa-building-wheat"></i> NutriEscola</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#conteudoNavbarSuportado" aria-controls="conteudoNavbarSuportado" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(página atual)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="#">Contato </a>
            </li>


          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" aria-label="Pesquisar">
            <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Pesquisar</button>
            <a href="login.php" class="btn btn-outline-light my-2 my-sm-0 m-2"> <i class="fa-solid fa-right-to-bracket"></i> Logar </a>

          </form>
        </div>
      </nav>


    <div class="container">

    <h1 class="m-5 text-center"> Bem-vindo ao NutriEscola!  </h1>
    <p class="lead text-center"> Nutrindo mentes, cultivando futuros 🚀</p>


      <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="recursos/foto.jfif" alt="Primeiro Slide" style="max-height: 850px; border-radius: 20px;" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="recursos/foto2.jfif" alt="Segundo Slide" style="max-height: 850px; border-radius: 20px;" >
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="recursos/foto4.jfif" alt="Terceiro Slide"  style="max-height: 850px; border-radius: 20px;" >
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>

        <h1 class="m-4">Objetivo</h1>
        <p> Um site para mostrar ao alunos e pais a alimentação escolar.</p>

        <div class="row">
            <div class="col-md">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="recursos/foto 5.jfif" alt="Imagem de capa do card">
                    <div class="card-body">
                      <h5 class="card-title">Colégio Ary João Dresch</h5>
                      <p class="card-text">Nova Londrina</p>
                      <a href="#" class="btn btn-primary">Visitar</a>
                    </div>
                  </div>
            </div>

            <div class="col-md">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="recursos/foto 5.jfif" alt="Imagem de capa do card">
                    <div class="card-body">
                      <h5 class="card-title">Colégio Ary João Dresch</h5>
                      <p class="card-text">Nova Londrina</p>
                      <a href="#" class="btn btn-primary">Visitar</a>
                    </div>
                  </div>
            </div>

            <div class="col-md">
                <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="recursos/foto 5.jfif" alt="Imagem de capa do card">
                    <div class="card-body">
                      <h5 class="card-title">Colégio Ary João Dresch</h5>
                      <p class="card-text">Nova Londrina</p>
                      <a href="#" class="btn btn-primary">Visitar</a>
                    </div>
                  </div>
            </div>

            
        </div>

    </div>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="recursos/paginaInicial.js"></script>
</body>
</html>