<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
    <head>
        <link rel="stylesheet" type="text/css" href="principal.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <meta charset="utf-8">
        <script src="jquery-3.2.1.min.js"></script>
        <script src="javascript.js"></script>

        <title>Barra de navegação</title>

    </head>
<?php
if(isset($_GET['botao'])){
    echo "<script>alert(".$_GET['botao'].");
      window.location = 'principal.php';
    </script>";
  }
?>
    <body>
        <div class="j1">
            <ul class="nav">
                <li><a href="agendar.html"> Agendamento de consulta</a></li>
                <li><a href="agendadas.php"> Consultas agendadas</a></li>
                <li><a href="cadastro.html"> Cadastrar funcionários</a></li>
                <li><a href="cadastrados.php"> Funcionários Cadastrados</a></li>
            </ul>
        </div>

    </body>
</html>