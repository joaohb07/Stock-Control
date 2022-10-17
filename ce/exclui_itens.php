<?php
 session_start();
 include ("bd.php");

 $nome=$_POST['item'];

 $sql = " DELETE FROM produtos WHERE nome = '$nome'";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: home.php");
    exit();
 }else{
    header("Location: home.php");
    exit ();
 }
?>