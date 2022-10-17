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

if (isset($_POST['botao']))
{
    $estoqueedit = $_POST['estoqueedit'];
    $query = mysqli_query($con, "UPDATE produtos SET estoque = '" . $_POST['estoqueedit'] . "' WHERE id = '" . $row2['id'] . "'");
    if ($query)
    {
        header("Location: estoque.php");
    }
    else
    {
        header("Location: estoque.php");
    }
}
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="/img/box.png">
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
        <a href="home.php" class="shadow-lg btn btn-danger" role="button" aria-pressed="true">Voltar</a>
        <a class="navbar-brand float-left" href="estoque.php"><strong>Estoque</strong></a>
        <a href="editest.php" class="shadow-lg btn text-white" style="background-color:#5271ff;" role="button" aria-pressed="true">Editar</a>
      </nav>
    </header>
    <div class="jumbotron col-xl-8 col-lg-8 col-md-8 col-sm-10 col-10 mx-auto" style="background-color: rgba(0, 0, 0, 0);">
      <main>
        <?php
  $busca_categoria = mysqli_query($con, "SELECT * FROM categorias WHERE idUser ='" . $exibe1['id'] . "'");

  while ($row1 = mysqli_fetch_assoc($busca_categoria))
  {
  ?>
        <div class="shadow-lg list-group-item list-group-item-action flex-column align-items-start">
          <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1"><strong><?php echo $row1['nome']; ?></strong></h5>
          </div>
          <br/>
          <ul class="list-group">
            <?php
    $busca_produtos = mysqli_query($con, "SELECT * FROM produtos WHERE categoria ='" . $row1['id'] . "'");

    while ($row2 = mysqli_fetch_assoc($busca_produtos))
    {
?>
            <li style="font-size:18px;" class=
              <?php if (($row2['estoque'] > 0) && ($row2['estoque'] <= $row2['estoqueMin']))
        {
            echo "'shadow list-group-item list-group-item-warning'";
        }
        if ($row2['estoque'] <= 0)
        {
            echo "'shadow list-group-item list-group-item-danger'";
        }
        else
        {
            echo "'shadow list-group-item list-group-item-info'";
        }
?>
              >
              <strong> <?php echo $row2['nome']; ?></strong>
              <button class="btn text-white btn-sm float-right" style="background-color: #5271ff;" type="button" data-toggle="collapse" data-target="#<?php echo $row2['nome']; ?>" aria-expanded="false" aria-controls="<?php echo $row2['nome']; ?>">
              <strong>Detalhes</strong>
              </button>
              <br/>
              <div class="collapse" id="<?php echo $row2['nome']; ?>">
                <div>
                  <br>
                  <strong>Estoque atual: <?php echo $row2['estoque']; ?></strong><br/>
                  <p style="font-size: 16px;">(*Para mudar, clique em 'editar')</p>
                  <strong> Informações do Produto:</strong><br/>
                  <p style="font-size:12px;">Estoque mínimo: <?php echo $row2['estoqueMin']; ?><br/>
                  Descrição: <?php echo $row2['descProd']; ?><br/>
                  Localização: <?php echo $row2['locprod']; ?><br/>
                  Código: <?php echo $row2['codprod']; ?></p>
                </div>
              </div>
            </li>
            <?php
    } ?> 
          </ul>
        </div>
        <?php
} ?>
      </main>
    </div>
  </body>
</html>