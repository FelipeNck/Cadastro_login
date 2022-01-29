<?php
session_start();
include("conexao.php");

$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$senha = mysqli_real_escape_string($mysqli, $_POST['senha']);

// Aqui é verificado se existe esse email e senha no banco de dados
// Se existir, retorna 1. Se não, retorna 0.
$query = "select * from usuario where id_email = '$email' and senha = '$senha'";
$result = mysqli_query($mysqli, $query);
$row = mysqli_num_rows($result);
if ($row == 1){
    $_SESSION['valido'] = true;
    header('Location: login.php');
    exit;
}else{
    $_SESSION['invalido'] = true;
    header('Location: login.php');
    exit;
}

?>