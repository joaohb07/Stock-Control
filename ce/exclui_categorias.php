<?php
 session_start();
 include ("bd.php");

 $nome=$_POST['nome'];
 
 

 
$busca_categoria=mysqli_query($con, "SELECT id FROM categorias WHERE nome ='".$nome."'");
$id_categoria = mysqli_fetch_array($busca_categoria);

 $sql = " DELETE FROM categorias WHERE id = '".$id_categoria['id']."' ";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: categorias.php");
    exit();
 }else{
    header("Location: categorias.php");
    exit ();
 }
?>