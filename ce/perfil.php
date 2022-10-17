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
    <title>Perfil</title>
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
  <body style="background-color: #5271ff">
    <header>
      <nav class="shadow-lg navbar navbar-dark" style="background-color: #1d1d45;">
        <a class="navbar-brand" href="perfil.php"><strong>Perfil</strong></a>
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
                    ?>
                </p>
                <hr style="background-color: #fff;">
              </div>
              <div class="col-sm-8 col-md-7 py-2">
                <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                  <a href="home.php" class="nav-link">Início</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="perfil.html" >Perfil<span class="sr-only">(current)</span></a>
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
      <div class="jumbotron col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10 mx-auto" style="background-color: rgba(0, 0, 0, 0);">
      <div class="shadow-lg card text-white" style="background-color: #5271ff">
        <div class="card-body">
          <h5 class="card-title">Edite seu Perfil</h5>
          <hr style="background-color: #fff">
          <form method="POST" action="atualiza_dados.php">
            <?php
              if(isset($_SESSION['campos_vazios'])):
              ?>
            <div class="alert alert-danger" role="alert">
              <strong>Todos os campos devem ser preenchidos!</strong>
            </div>
            <?php
              endif;
              unset($_SESSION['campos_vazios']);
              ?>
            <div class="form-group">
              <label ><b>Primeiro Nome:</b> <?php echo $exibe['Pnome'];?></label>
              <div class="input-group">
                <input type="text" name="Pnomeup" class="form-control" placeholder="Editar primeiro nome..." value="<?php echo $exibe['Pnome'];?>">
              </div>
            </div>
            <div class="form-group">
              <label ><b>Segundo Nome:</b> <?php echo $exibe['Snome'];?></label>
              <div class="input-group">
                <input type="text" name="Snomeup" class="shadow-lg form-control"  placeholder="Editar segundo nome..." value="<?php echo $exibe['Snome'];?>">
              </div>
            </div>
            <div class="form-group">
              <label ><b>Nome da Empresa:</b> <?php echo $exibe['nomEmp'];?></label>
              <div class="input-group">
                <input type="text" name="nomeEmpup" class="shadow-lg form-control"  placeholder="Editar nome da empresa..." value="<?php echo $exibe['nomEmp'];?>">
              </div>
            </div>
            <div class="form-group">
              <label ><b>Descrição da Empresa:</b> <?php echo $exibe['descEmp'];?></label>
              <div class="input-group">
                <input class="shadow_lg form-control" name="descEmpup"  placeholder="Editar descrição da empresa..." value="<?php echo $exibe['descEmp'];?>"></input>
              </div>
              <br/>
              <button class="btn btn-block btn-success shadow-lg" type="submit">Editar</button> 
            </div>
          </form>
          <form method="POST" action="atualiza_login.php">
            <hr style="background-color: #fff;">
            <h5 class="card-title">Edite seu Login <span class="badge badge-pill badge-danger">Será necessário logar novamente!</span></h5>
            <hr style="background-color: #fff;">
            <?php
              if(isset($_SESSION['campos_login_vazios'])):
               ?>
            <div class="alert alert-danger" role="alert">
              <strong>Todos os campos devem ser preenchidos!</strong>
            </div>
            <?php
              endif;
              unset($_SESSION['campos_login_vazios']);
               ?>
            <div class="form-group">
              <label ><b>Email:</b> <?php echo $exibe['email'];?></label>
              <div class="input-group">
                <input type="email" name="emailup" class="shadow-lg form-control"  placeholder="Editar e-mail..." value="<?php echo $exibe['email']; }?>">
              </div>
            </div>
            <div class="form-group">
              <label ><b>Senha</b></label>
              <input type="password" name="senhaatual" class="shadow-lg form-control"  placeholder="Senha atual..."><br>
              <input type="password" name="senhaup" class="shadow-lg form-control"  placeholder="Nova senha...">
              <br/>
              <button class="btn btn-block btn-success shadow-lg" type="submit">Editar</button> 
            </div>
            <hr style="background-color: #fff;">
            <a href="logout.php" class="btn btn-danger btn-block">Log Out</a>
          </form>
        </div>
      </div>
    </main>
    <br/><br/>
  </body>
</html>