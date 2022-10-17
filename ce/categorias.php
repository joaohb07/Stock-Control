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
  else
  { 
    $exibe1 = mysqli_fetch_array($busca);
  }
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="/img/box.png">
    <title>Categorias</title>
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
        <a href="home.php" class="shadow-lg btn btn-danger" role="button" aria-pressed="true">Voltar</a>
        <a class="navbar-brand" href="categorias.php"><strong>Categorias</strong></a>
        <a class="shadow-lg btn text-white float-right" data-toggle="modal" data-target="#exampleModalCenter" style="background-color: #5271ff;"  role="button" aria-pressed="true">Criar </a>
        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Criar uma categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form method="POST" action="insert_categorias.php">
                  <div class="form-group">
                    <label for="nome">Nome da Categoria</label>
                    <input type="text" name="nome" class="form-control" id="nome" aria-describedby="emailHelp" placeholder="Ex.: Verduras">
                    <small id="emailHelp" class="form-text text-muted">Esse nome poderá ser editado.</small>
                  </div>
              </div>
              <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
              <button type="submit" class="btn text-white" style="background-color:#5271ff;">Criar</button>
              </form>
              </div>
            </div>
          </div>
        </div>
      </nav>
    </header>
    <main>
      <br/>
      <form method="POST" action="atualiza_categorias.php">
        <div class="jumbotron col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 mx-auto" style="background-color:  rgba(0, 0, 0, 0);">
          <?php
            $result = mysqli_query($con, "SELECT nome FROM categorias WHERE idUser ='".$exibe1['id']."'");
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
          <div class="card shadow-lg">
            <div class="card-header">
              <h5 class="mb-1">Editar uma Categoria</h5>
            </div>
            <div class="card-body">
              <select name="nome" class="shadow custom-select" id="inputGroupSelect01">
                <option selected>Escolha uma categoria...</option>
                <?php
                  $result = mysqli_query($con, "SELECT nome FROM categorias WHERE idUser ='".$exibe1['id']."'");
                  while($row = mysqli_fetch_assoc($result))
                  {
                  ?>
                <option><?php echo $row['nome']; ?></option>
                <?php } ?>
              </select>
              <br/><br/> 
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <button class="btn text-white shadow" style="background-color:#5271ff;" type="submit" id="button-addon1">Editar</button>
                </div>
                <input type="text" class="form-control shadow" name="nome_novo" placeholder="Troque o nome da categoria..." aria-label="Example text with button addon" aria-describedby="button-addon1">
              </div>
              <button type="submit" formaction="exclui_categorias.php" class="shadow btn btn-block btn-danger">Excluir Categoria</button>
            </div>
          </div>
          <?php } ?>
        </div>
      </form>
    </main>
</html>