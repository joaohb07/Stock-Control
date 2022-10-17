<?php

session_start();
include("bd.php");

$Pnomeup = filter_input(INPUT_GET,"Pnomeup");
$Snomeup = filter_input(INPUT_GET,"Snomeup");
$nomeEmpup = filter_input(INPUT_GET,"nomeEmpup");
$descEmpup = filter_input(INPUT_GET,"descEmpup");

if(empty($_POST['Pnomeup']) || empty($_POST['Snomeup']) || empty($_POST['nomeEmpup']) || empty($_POST['descEmpup']) ){
    $_SESSION['campos_vazios'] = true;
    header("Location: perfil.php");
    exit();
}else{
$query = mysqli_query($con,"UPDATE usuario SET Pnome ='".$_POST['Pnomeup']."',Snome ='".$_POST['Snomeup']."',nomEmp ='".$_POST['nomeEmpup']."',descEmp ='".$_POST['descEmpup']."' WHERE email = '".$_SESSION['email']."'");
if($query){
    header("Location: perfil.php");
}else{
    echo "Impossível atualizar os campos!";
}
}

?>