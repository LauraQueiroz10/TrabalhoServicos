<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
    <head>
        <link rel="stylesheet" type="text/css" href="alterar_cadastro.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <meta charset="utf-8">
        <title> Tela de Cadastro </title>
    </head>
    <?php
        $acao = $_POST["botao"];
        $nome = $_POST["name"];
        $cpf = $_POST["CPF"];
        $senha = $_POST["senha"];
        $cpf_antigo = $cpf;
    ?>



    <body class="body">
        <div class="cadastro">
            <h1>Alterar dados de cadastro</h1>
                    <form id="register-form" method="POST" name="gerenciando" action="gerenciando.php"> 
                       <div class="full-box spacing">
                            <label for="name">Nome completo</label>
                            <input type="text" name="name" id="name" value="<?php echo $nome;?>" data-max-length="40" data-required> 
                        </div>
                       <div class="full-box spacing" >
                            <label for="CPF">CPF</label>
                            <input type="text" name="CPF" id="cpf" value="<?php echo $cpf;?>" data-cpf-length="11" data-min-length="11" data-required> 
                        </div>
                        <div class="full-box spacing">
                            <label for="senha">Insira sua senha</label>
                            <input type="password" name="senha" id="senha" value="<?php echo $senha;?>" data-required > 
                        </div>
                        <input type="hidden" name="cpf_antigo" id="senha" value="<?php echo $cpf_antigo;?>">
                        <input type="submit" name="botao" id="botao" value="Atualizar Cadastro">
                        <input type="button" name="botao" id="voltar" value="Voltar para o cadastramento" onclick="history.go(-1)">
                        <input type="button" name="botao" id="voltar" value="Voltar para o menu principal" onclick="history.go(-2)">
                    </form>            
        </div>
        <p class="erro-autenticacao template"></p>
        <script src="cadastro.js"></script>
        
    </body>

</html>