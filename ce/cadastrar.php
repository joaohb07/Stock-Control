<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="icon" type="image/x-icon" href="/img/box.png">
      <title>Cadastrar</title>
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
   <body style="background-color: #5271ff;">
      <div style="background-color:#1d1d45;height:60px;" class="shadow-lg container-fluid fixed-top">
         <h1 class="float-left text-white">Cadastrar-se</h1>
         <hr>
      </div>
      <br/><br/>
      <div class="jumbotron col-lg-8 mx-auto" style="background-color: #5271ff;">
        <div style="background-color:#1d1d45;height:60px;" class="shadow-lg container-fluid fixed-top">
         <h1 class="float-left text-white">Cadastrar-se</h1>
         <hr>
      </div>
         <div class="card shadow-lg mx-auto" style="width: 100%;">
            <div class="card-body">
               <form method="POST" action="insert.php">
                  <h5 class="card-title">Cadastro pessoal</h5>
                  <div class="form-row mx-auto">
                     <?php
                        if(isset($_SESSION['campos_vazios_cadastro'])):
                        ?>
                     <div class="alert alert-danger" role="alert">
                        <strong>Email ou senha incorretos!</strong>
                     </div>
                     <?php
                        unset ($_SESSION['campos_vazios_cadastro']);
                          endif;
                         ?>
                     <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="shadow form-control" id="email" placeholder="Email">
                     </div>
                     <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label for="senha">Senha</label>
                        <input type="password" name="senha" class="shadow form-control" id="senha" placeholder="Senha">
                     </div>
                     <div class="form-row col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                           <label for="Pnome">Primeiro Nome</label>
                           <input type="text" name="Pnome" class="shadow form-control" id="Pnome" placeholder="Pedro">
                        </div>
                        <div class="form-group col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6">
                           <label for="Snome">Segundo Nome</label>
                           <input type="text" name="Snome" class="shadow form-control" id="Snome" placeholder="da Silva">
                        </div>
                     </div> 
                     <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label for="nomEmp">Nome da Empresa</label>
                        <input type="text" name="nomEmp" class="shadow form-control" id="nomEmp">
                     </div>
                     <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <label for="tipoEmp">Tipo da Empresa</label>
                        <select id="tipoEmp" name="tipoEmp" class="shadow form-control">
                           <option selected>Escolha o tipo da empresa...</option>
                           <option value="EI">EI</option>
                           <option value="MEI">MEI</option>
                           <option value="EIRELI">EIRELI</option>
                           <option value="Sociedade Privada">Sociedade Privada</option>
                        </select>
                     </div>
                     <div class="form-group col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <h5 class="card-title">Descrição da empresa</h5>
                        <input type="text" class="shadow form-control" name="descEmp" id="descEmp" placeholder="Ex.:Restaurante...">
                     </div>
                  </div>
                  <hr>
                  <input type="submit" class="btn text-white btn-block shadow" style="background-color:#5271ff;" value="Cadastrar" id="insert"></input>
                  <a href="index.php" class="btn btn-danger btn-block shadow" role="button" aria-pressed="true">Voltar</a>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>