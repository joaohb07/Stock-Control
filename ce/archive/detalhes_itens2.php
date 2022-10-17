<?php 
  session_start();
  
  
  include("bd.php");
  
  $nome_item=$_POST['categoria'];
  
  
  $busca_categoria = mysqli_query($con, "SELECT id FROM categorias WHERE nome ='".$nome_item."'");
  $exibe2 = mysqli_fetch_array($busca_categoria);
  
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Estoque</title>
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
        <a class="navbar-brand float-left" href="categorias.html"><strong>Editar</strong></a>
        <a href="detalhes_itens.php" class="shadow-lg btn btn-danger" role="button" aria-pressed="true">Voltar</a>
      </nav>
    </header>
    <div class="jumbotron col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 mx-auto" style="background-color: rgba(0, 0, 0, 0);">
    <main>
    <div class="card shadow-lg">
    <form method="POST" action="editar_item.php">
      <div class="card-body">
        <h5  class="card-title">2.Item</h5>
        <select  name="item" id="inputCatItem" class="shadow form-control">
          <option selected>Escolha o item...</option>
          <?php
            $result = mysqli_query($con, "SELECT nome FROM produtos WHERE categoria ='".$exibe2['id']."'");
            while($row = mysqli_fetch_assoc($result))
            {
            ?>
          <option value="<?php echo $row['nome']; ?>"><?php echo $row['nome']; ?></option>
          <?php } ?>
        </select>
        <br>
        <h5 class="card-title">3.Editar item</h5>
        <div class="form-group input-group mb-3">
          <input type="text" name="nomeup" class="shadow form-control" id="inputAddress" placeholder="Novo Nome">
        </div>
        <div class="form-group input-group mb-3">
          <input type="text" name="descProdup" class="shadow form-control" id="inputAddress" placeholder="Nova Descrição">
        </div>
        <div class="form-group input-group mb-3">
          <input type="text" name="estoqueup" class="shadow form-control" id="inputAddress" placeholder="Novo Estoque Atual">
        </div>
        <div class="form-group input-group mb-3">
          <input type="text" name="estoqueMinup" class="shadow form-control" id="inputAddress" placeholder="Novo Estoque Mínimo">
        </div>
        <div class="form-group input-group mb-3">
          <input type="text" name="locprodup" class="shadow form-control" id="inputAddress" placeholder="Nova Localização">
        </div>
        <div class="form-group input-group mb-3">
          <input type="text" name="codprodup" class="shadow form-control" id="inputAddress" placeholder="Novo Código">
        </div>
        <input class="shadow btn btn-success btn-block" type="submit" value="Editar"><br/>
        <button type="submit" formaction="exclui_itens.php" class="shadow btn btn-danger btn-block">Excluir</button>
    </form>
    </div>
    </form>
  </body>
</html>