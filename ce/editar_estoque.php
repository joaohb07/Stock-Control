<?php

session_start();
include("bd.php");
include ("estoque.php");

$estoqueedit = $_POST['estoqueedit'];

if(empty($_POST['estoqueedit']) ){
    header("Location: estoque.php");
    exit();
}else{
$query = mysqli_query($con,"UPDATE produtos SET estoque = '$estoqueedit' WHERE estoque = '".$row2['estoque']."'");
if($query){
    header("Location: estoque.php");
}else{
    header("Location: home.php");
}
}

?>