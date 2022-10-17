<?php
 session_start();
 include ("bd.php");

 $nome=$_POST['nome'];
 $nome_novo=$_POST['nome_novo'];
 
 

 
$busca_categoria=mysqli_query($con, "SELECT id FROM categorias WHERE nome ='".$nome."'");
$id_categoria = mysqli_fetch_array($busca_categoria);

 $sql = " UPDATE categorias SET nome = '".$nome_novo."' WHERE id = '".$id_categoria['id']."' ";
 $salvar = mysqli_query($con,$sql);

 if($salvar){
    header("Location: categorias.php");
    exit();
 }else{
    header("Location: categorias.php");
    exit ();
 }
?>