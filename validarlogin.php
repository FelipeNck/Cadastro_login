<?php
session_start();
include("conexao.php");

$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

$query = "select * from usuario where id_email = '$email' and senha = '$senha'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_num_rows($result);
if ($row == 1){
    $_SESSION['valido'] = true;
    header('Location: login.php');
    $mysqli->close();
    exit;
}else{
    $_SESSION['invalido'] = true;
    header('Location: login.php');
    exit;
}

?>