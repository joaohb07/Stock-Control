<?php

  session_start();
  
  include("bd.php");
  $busca = mysqli_query($con, "SELECT * FROM usuario WHERE email ='".$_SESSION['email']."'");
  $row = mysqli_num_rows($busca);
  if ($row == 0)
  {
    header("Location: index.php");
    exit();
  }
  
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="/img/box.png">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <style>
      .registrar{
      color: #5271ff;
      background-color: #fff;
      border-color:#5271ff;
      }
    </style>
  </head>
  <body style="background-color: #5271ff;">
    <header>
      <nav class="shadow-lg navbar navbar-dark" style="background-color: #1d1d45;">
        <a class="navbar-brand" href="home.php"><strong>Início</strong></a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample01" aria-controls="navbarsExample01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="navbar-collapse collapse" id="navbarsExample01">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-md-7 py-2">
                <?php
                  while($exibe = mysqli_fetch_array($busca)){
                   ?>
                <h6 class="text-white"><?php echo $exibe['nomEmp']; ?></h6>
                <hr style="background-color: #fff;">
                <p class="text-muted">
                  <?php
                    echo $exibe['Pnome']." ".$exibe['Snome']."<br>Tipo da Empresa: ".$exibe['tipoEmp']."<br>Descrição da Empresa: ".$exibe['descEmp'];
                    }
                    ?>
                </p>
                <hr style="background-color: #fff;">
              </div>
              <div class="col-sm-8 col-md-7 py-2">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a href="home.php" class="nav-link">Início<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="perfil.php" >Perfil</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="modal" data-target="#exampleModalCenter">Log Out</a>
                </li>
                <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalCenterTitle">Log Out</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        Você deseja mesmo sair?
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Não</button>
                        <a href="logout.php" class="btn text-white" style="background-color:#5271ff;" role="button" aria-pressed="true">Sim</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <main>
    <div class="jumbotron col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 mx-auto" style="background-color: rgba(0, 0, 0, 0);">
      <div class="shadow-lg card text-white" style="background-color: #5271ff">
        <div class="card-body">
          <h5 class="card-title">Categorias</h5>
          <p class="card-text">Crie e edite suas categorias de estoque, para deixar tudo mais organizado.</p>
          <a href="categorias.php" class="btn registrar active btn-block" role="button" aria-pressed="true">Acesse as Categorias</a>
        </div>
      </div>
      <div class="shadow-lg card text-white" style="background-color: #5271ff">
        <div class="card-body">
          <h5 class="card-title">Itens</h5>
          <p class="card-text">Crie itens para adicionar nas suas categorias de estoque.</p>
          <a href="additens.php" class="btn registrar active btn-block" role="button" aria-pressed="true">Criar Itens</a>
        </div>
      </div>
      <div class="shadow-lg card text-white" style="background-color: #5271ff">
        <div class="card-body">
          <h5 class="card-title">Estoque</h5>
          <p class="card-text">Acesse seu estoque para remover ou adicionar itens nas suas categorias.</p>
          <a href="estoque.php" class="btn registrar active btn-block" role="button" aria-pressed="true">Acesse o Estoque</a>
        </div>
      </div>
      <!-- <div class="shadow-lg card text-white" style="background-color: #5271ff">
        <div class="card-body">
          <h5 class="card-title">Histórico</h5>
          <p class="card-text">Acesse o histórico de entradas e saídas do seu estoque.</p>
          <a href="historico.html" class="btn registrar active btn-block" role="button" aria-pressed="true">Acesse o Histórico</a>
        </div>
      </div> -->
      <br/>
    </div>
    </div>
  </body>
</html>