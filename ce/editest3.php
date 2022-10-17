<?php
session_start();
include ("bd.php");

$editest = $_POST['editest'];
$item = $_POST['item'];

if (empty($_POST['editest']) and $_POST['editest'] != 0)
{
    header("Location: editest3.php");
    exit();
}
else
{
    $query = mysqli_query($con, "UPDATE produtos SET estoque='$editest' WHERE nome = '$item'");
    if (!$query)
    {
        header("Location: editest2.php");
    }
    else
    {
        header("Location: estoque.php");
    }
}
?>