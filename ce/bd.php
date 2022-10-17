<?php
 $hostname = "db";
 $user = "test";
 $password = "test";
 $database = "ce";

 $con = mysqli_connect($hostname,$user,$password,$database);

 if(!$con){
    echo "Não foi possível conectar ao banco de dados";
 }
?>