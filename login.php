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
    <title>Login</title>
</head>
<body>
    <form action="validarlogin.php" method="post">
        <h1>Login</h1>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="senha" placeholder="Senha" required>

        <input id="button" type="submit" value="Logar">
        <?php
        if(isset($_SESSION['invalido'])):
        ?>
        <div class="msg">
            <p>Email ou senha inválidos</p>
        </div>
        <?php
        endif;
        unset($_SESSION['invalido']);
        if(isset($_SESSION['valido'])):
        ?>
        <div class="msg">
            <p>Login feito com sucesso</p>
        </div>
        <?php
        endif;
        unset($_SESSION['valido']);
        ?>
    </form>
</body>
</html>