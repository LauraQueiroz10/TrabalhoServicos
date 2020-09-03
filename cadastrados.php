<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
    <head>
        <link rel="stylesheet" type="text/css" href="cadastrados.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <meta charset="utf-8">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <title> Tela dos funcionários cadastrados </title>
    </head>
    <?php
if(isset($_GET['botao'])){
    echo "<script>alert(".$_GET['botao'].");
      window.location = 'cadastrados.php';
    </script>";
  }
?>
    <body class="body">
    	<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
		<script type="text/javascript">
		$(document).ready(function() {
    		$('#example').DataTable();
		} );
		</script>
				<?php
                include ("Connection.php");
                $result = pg_query($dbconn, "SELECT * FROM Funcionarios");
                if (!$result) {
                    echo "Something went wrong.";
                    exit;
                }
                ?>
		<h2 align="center">Funcionários cadastrados</h2><br> 
		<form><input align="center" type="button" name="botao" value="Voltar" onclick="history.go(-1)"></form>
                <table id="example" class="table table-striped table-bordered" width=93% align="center" style="background-color: #C0C0C0">
        <thead>
            <tr>
            	<th>Funcionário</th>
                <th>CPF</th>
                <th>Senha</th>
                <th>Excluir</th>
                <th>Alterar</th>
            </tr>
        </thead>
        <tbody>
        	<?php
                while ($arr = pg_fetch_array($result)) {?>
                	<tr>
                		<td align="center" valign=""><?php echo $arr["nome"];?></td>
                		<td><?php echo $arr["cpf"];?></td>
                		<td><?php echo $arr["senha"];?></td>
                		<td align="center"><form name="gerenciando" method="POST" action="gerenciando.php">
                            <input hidden="" name="CPF" value="<?php echo $arr["cpf"];?>">
                            <input hidden="" name="senha" value="<?php echo $arr["senha"];?>">
                            <input type="submit" style="width:25px; height:25px" name="botao" id="botao" value="X   Funcionario"></form></td>
                		<td align="center"><form name="gerenciando" method="POST" action="alterar_cadastro.php">
                            <input hidden="" name="name" value="<?php echo $arr["nome"];?>">
                            <input hidden="" name="CPF" value="<?php echo $arr["cpf"];?>">
                            <input hidden="" name="senha" value="<?php echo $arr["senha"];?>">
                            <input type="submit" style="width:25px; height:25px" name="botao" id="botao" value="A   Funcionario"></form></td>	
            		</tr>
            <?php    }
            ?>
        </tbody>
    </table>        
    </body>
</html>
