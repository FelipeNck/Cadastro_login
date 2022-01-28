<?php
session_start();
include("conexao.php");

$nome = mysqli_real_escape_string($mysqli, trim($_POST['nome']));
$nick = mysqli_real_escape_string($mysqli, trim($_POST['nick']));
$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
$senha = mysqli_real_escape_string($mysqli, trim($_POST['senha']));

// Aqui é verificado se o email já foi utilizado.
$sql = "select count(*) as total from usuario where id_email = '$email'";
$result = mysqli_query($mysqli, $sql);
$row = mysqli_fetch_assoc($result);
if ($row['total'] == 1){
    $_SESSION['usuario_existe'] = true;
    header('Location: cadastro.php');
    exit;
}

// Aqui é inserido no banco de dados as informações passadas pelo usuário.
$sql = "INSERT INTO usuario (nome, nick, id_email, senha) VALUES ('$nome', '$nick', '$email', '$senha')";

if ($mysqli->query($sql) === TRUE){
    $_SESSION['status_cadastro'] = true;
}

$mysqli->close();

header('Location: login.php');
exit;
?>