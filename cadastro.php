<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro</title>
</head>
<body>
    <form action="validarcadastro.php" method="post">
        <h1>Cadastro</h1>

        <input type="text" name="nome" placeholder="Nome" required>
        <input type="text" name="nick" placeholder="Nick" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>

        <input id="button" type="submit" value="Cadastrar">

        <?php
        if(isset($_SESSION['usuario_existe'])):
        ?>
        <div class="msg">
            <p>Usuário já cadastrado</p>
            <p>Efetue o login clicando <a href="login.php" style="color: white;">aqui</a></p>
        </div>
        <?php
        endif;
        unset($_SESSION['usuario_existe']);
        ?>
    </form>
</body>
</html>