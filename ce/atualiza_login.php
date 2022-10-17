<?php

session_start();
include("bd.php");

$emailup = filter_input(INPUT_GET,"emailup");
$senhaup = filter_input(INPUT_GET,"senhaup");
$senhaatual = filter_input(INPUT_GET,"senhaatual");


if(empty($_POST['emailup']) || empty($_POST['senhaup'])){
    $_SESSION['campos_login_vazios'] = true;
    header("Location: perfil.php");
    exit();
}else{
$query = mysqli_query($con,"UPDATE usuario SET email ='".$_POST['emailup']."',senha ='".$_POST['senhaup']."' WHERE email = '".$_SESSION['email']."'");
if($query){
    header("Location: login.php");
    session_destroy();
    }
}
?>