<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
    <head>
        <link rel="stylesheet" type="text/css" href="alterar_agendar.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <meta charset="utf-8">
        <title> Tela de Cadastro de ficha </title>
    </head>
    <?php
        $name = $_POST["name"];
        $cpf = $_POST["CPF"];
        $data = $_POST["data"];
        $sus = $_POST["sus"];
        $prioridade = $_POST["prioridade"];
        $tipo = $_POST["tipo"];
        $cpf_antigo = $cpf;
    ?>
    <body class="body">
        <div class="agendar">
            <h1>Alterar ficha</h1>
                    <form id="register-form" method="POST" name="gerenciando" action="gerenciando.php">
                        <div class="full-box spacing">
                            <label for="name">Nome completo</label>
                            <input type="text" name="name" id="name" value="<?php echo $name;?>" data-max-length="40" data-required> 
                        </div>
                        <div class="full-box spacing" >
                            <label for="CPF">CPF</label>
                            <input type="text" name="CPF" id="cpf" value="<?php echo $cpf;?>" data-cpf-length="11" data-min-length="11" data-required> 
                        </div>
                        <div class="full-box spacing" >
                            <label for="sus">Número do cartão do SUS</label >
                            <input type="text" name="sus" id="sus" value="<?php echo $sus;?>" data-cpf-length="15" data-min-length="15" data-required> 
                        </div>
                        <div class="full-box spacing" >
                            <label for="data"> Data da consulta</label>
                            <input type="date" value="<?php echo $data;?>" name="data" id="data" data-required> 
                        </div>
                        <div class="half--box spacing">
                            <label for="data"> Prioridade</label>
                            <select name="prioridade">
                                <option> Não prioritário</option>
                                <option> Prioridade comum</option>
                                <option> Prioridade especial</option>
                            </select>
                        </div>
                        <div class="half--box spacing">
                            <label for="data"> Consulta com: </label>
                            <select name="profissional">
                                <option> Dentista(o)</option>
                                <option> Médica(o)</option>
                            </select>
                        </div>                        
                        <input type="submit" name="botao" id="botao" value="Salvar alterações">
                         <input type="button" name="botao" id="voltar" value="Voltar para as fichas cadastradas" onclick="history.go(-1)">
                        <input type="button" name="botao" id="voltar" value="Voltar para o menu principal" onclick="history.go(-2)">
                    </form>            
        </div>
        <p class="erro-autenticacao template"></p>
        <script src="/home/sara/Documentos/TrabalhoServico/cadastro.js"></script>
        
        
    </body>




</html>
