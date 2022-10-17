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
    <title>Itens</title>
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
        <a class="navbar-brand float-left" href="categorias.html"><strong>Adicionar Itens</strong></a>
        <a href="home.php" class="shadow-lg btn btn-danger text-white" role="button" aria-pressed="true">Voltar</a>
        <!-- <a href="detalhes_itens.php" class="shadow-lg btn text-white" role="button" aria-pressed="true" style="background-color: #5271ff;">Editar</a> -->
      </nav>
    </header>
    <main>
      <div class="jumbotron col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 mx-auto" style="background-color:rgba(0, 0, 0, 0);" >
      <div class="card-group">
      <div class="shadow-lg card" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Criar Itens</h5>
          <hr>
          <form method="POST" action="insert_itens.php">
            <div class="form-group mx-auto">
              <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Preencha <strong>todos os campos</strong> antes de continuar!
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="shadow form-control" name="nome" id="nom_item" placeholder="Nome do Item">
            </div>
            <div class="form-group">
              <input type="text" class="shadow form-control" name="descProd" id="desc_item" placeholder="Descrição do Item">
            </div>
            <div class="form-group">
              <input type="text" class="shadow form-control" name="estoqueMin" id="est_min" placeholder="Estoque Mínimo (Ex.: 10)">
            </div>
            <!-- <div class="form-group">
              <input type="text" class="shadow form-control" name="estoqueSeg" id="est_min" placeholder="Estoque de Segurança (Ex.: 2)">
            </div> -->
            <div class="form-group">
              <input type="text" class="shadow form-control" name="estoque" id="est_atual" placeholder="Estoque Atual">
            </div>
            <div class="form-group">
              <input type="text" class="shadow form-control" name="locprod" id="loc_prod" placeholder="Localização do Produto">
            </div>
            <div class="form-group">
              <input type="text" class="shadow form-control" name="codprod" id="cod_prod" placeholder="Código do Produto">
            </div>
            <h5 class="card-title">Categoria do item</h5>
            <hr>
            <div class="form-group">
              <select name="categoria" id="inputCatItem" class="shadow form-control">
                <option selected>Escolha a categoria...</option>
                <?php
                  $result = mysqli_query($con, "SELECT nome FROM categorias WHERE idUser ='".$exibe1['id']."'");
                  while($row = mysqli_fetch_assoc($result))
                  {
                  ?>
                <option><?php echo $row['nome']; ?></option>
                <?php } ?>
              </select>
            </div>
            <button type="submit" class="shadow btn btn-block text-white" style="background-color:#5271ff;" >Criar Item</button>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>