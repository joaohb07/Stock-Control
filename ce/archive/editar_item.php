<?php

session_start();
include("bd.php");

$nomeup = $_POST['nomeup'];
$descProdup = $_POST['descProdup'];
$estoqueup = $_POST['estoqueup'];
$estoqueMinup = $_POST['estoqueMinup'];
$locprodup = $_POST['locprodup'];
$codprodup = $_POST['codprodup'];
$item = $_POST['item'];

if(empty($_POST['nomeup']) || empty($_POST['descProdup']) || empty($_POST['estoqueup']) || empty($_POST['estoqueMinup']) || empty($_POST['locprodup']) || empty($_POST['codprodup']) ){
    header("Location: detalhes_itens2.php");
    exit();
}else{
$query = mysqli_query($con,"UPDATE produtos SET nome ='$nomeup',descProd ='$descProdup',estoque ='$estoqueup',estoqueMin ='$estoqueMinup',locprod ='$locprodup',codprod ='$codprodup' WHERE nome = '$item'");
if($query){
    header("Location: home.php");
}else{
    header("Location: home.php");
}
}

?>