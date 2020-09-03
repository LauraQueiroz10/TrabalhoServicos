<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
    <head>
        <link rel="stylesheet" type="text/css" href="login.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <meta charset="utf-8">
        <title> Tela de login </title>
    </head>
    <?php
    if(isset($_GET['botao'])){
        echo "<script>alert(".$_GET['botao'].");
        window.location = 'index.php';
        </script>";
    }
    ?>
    <body class="body">
        <div class="login">
            <div class="imglogin"></div>
                <h2>Login</h2>
                    <form name="login" method="POST" action="login.php" id="register-form">
                        <p>CPF</p>
                        <input type="text" name="CPF" placeholder="Insira seu CPF de login">
                        <p>Senha</p>
                        <input type="password" name="senha" placeholder="Insira sua senha de login">
                        <input type="submit" name="" value="Login">
                    </form>            
        </div>
    </body>
</html>