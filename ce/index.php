<?php
  session_start();
  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/x-icon" href="/img/box.png">
    <link rel="icon" href="">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js"></script>
    <style>
      .logar{
      color: #5271ff;
      background-color: #fff;
      border-color:#5271ff;
      }
    </style>
  </head>
  <body style="background-color: #5271ff;">
    <header class="header">
      <div style="background-color:#1d1d45;height:60px;" class="shadow-lg container-fluid fixed-top">
        <h1 class="float-left text-white">Login</h1>
        <br/>
      </div>
    </header>
    <br/><br/>
    <main>
      <div class="jumbotron col-xl-6 col-lg-6 col-md-8 col-sm-9 col-9 mx-auto my-auto vh-100" style="background-color:#5271ff;" >
      <div class="row justify-content-center align-items-center">
      <div class="shadow-lg card" style="width: 100%;">
        <div class="card-body">
          <h5 class="card-title">Login</h5>
          <hr>
          <form method="POST" action="login.php">
            <?php
              if(isset($_SESSION['nao_autenticado'])):
              ?>
            <div class="alert alert-danger" role="alert">
              <strong>Email ou senha incorretos!</strong>
            </div>
            <?php
              unset($_SESSION['nao_autenticado']);
               endif;
               ?>
            <div class="form-group">
              <label for="exampleInputEmail1">Endereço de e-mail</label>
              <input type="email" name="email" class="shadow form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Senha</label>
              <input type="password" name="senha" class="shadow form-control" id="exampleInputPassword1" placeholder="Senha">
            </div>
            <input type="submit" class="shadow btn btn-block text-white" style="background-color:#5271ff;"  value="Login">
            <div class="text-center">
              <a href="cadastrar.php" style="color:#5271ff;">Não tem conta? Clique aqui e cadastre-se</a>
            </div>
          </form>
        </div>
      </div>
    </main>
  </body>
</html>