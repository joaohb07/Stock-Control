<?php
include ("bd.php");

$email = $_POST['email'];
$senha = $_POST['senha'];
$nomEmp = $_POST['nomEmp'];
$Pnome = $_POST['Pnome'];
$Snome = $_POST['Snome'];
$tipoEmp = $_POST['tipoEmp'];
$descEmp = $_POST['descEmp'];

//não deixa ir para página home sem logar
if (empty($_POST['senha']) || empty($_POST['email']) || empty($_POST['nomEmp']) || empty($_POST['Pnome']) || empty($_POST['Snome']) || empty($_POST['tipoEmp']) || empty($_POST['descEmp']))
{
    $_SESSION['campos_vazios_cadastro'] = true;
    header("Location: cadastrar.php");
    exit();
}

$sql = "INSERT INTO usuario (email,senha,nomEmp,Pnome,Snome,tipoEmp,descEmp) VALUES ('$email','$senha','$nomEmp','$Pnome','$Snome','$tipoEmp','$descEmp')";
$salvar = mysqli_query($con, $sql);

if ($salvar)
{
    header("Location: index.php");
    exit();
}
else
{
    header("Location: cadastrar.php");
    exit();
}
?>