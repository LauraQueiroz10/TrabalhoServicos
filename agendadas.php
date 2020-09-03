<!DOCTYPE html>
<html lang="pt-BR" dir="ltr">
    <head>
	<link rel="stylesheet" type="text/css" href="agendadas.css">
        <link href="https://fonts.googleapis.com/css?family=Comfortaa" rel="stylesheet">
        <meta charset="utf-8">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
		<link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
        <title> Tela de consulta </title>
    </head>
    <?php
if(isset($_GET['botao'])){
    echo "<script>alert(".$_GET['botao'].");
      window.location = 'agendadas.php';
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
                $result = pg_query($dbconn, "SELECT * FROM Fichas order by numero_ficha");
                if (!$result) {
                    echo "Something went wrong.";
                    exit;
                }
                ?> 
                <h2 align="center">Consultas agendadas</h2><br> 
		  <form>
                    <input type="button" name="botao" value="Voltar" onclick="history.go(-1)">
                </form>
                <table id="example" class="table table-striped table-bordered" width=93% align="center" style="background-color: #C0C0C0">
        <thead>
            <tr>
            	<th>Número da ficha</th>
               <th>Paciente</th>
                <th>CPF</th>
                <th>Prioridade</th>
                <th>Data da consulta</th>
                <th>Tipo da consulta</th>
                <th>Número SUS</th>
                <th>Excluir</th>
                <th>Alterar</th>
            </tr>
        </thead>
        <tbody>
        	<?php
                while ($arr = pg_fetch_array($result)) {?>
                	<tr>
                		<td align="center"><?php echo $arr["numero_ficha"];?></td>
                		<td><?php echo $arr["paciente"];?></td>
                		<td><?php echo $arr["cpf_paciente"];?></td>
                		<td><?php echo $arr["prioridade"];?></td>
                		<td><?php echo $arr["data_consulta"];?></td>
                		<td><?php echo $arr["tipo"];?></td>
                		<td><?php echo $arr["numero_sus"];?></td>
                		<td align="center"><form name="gerenciando" method="POST" action="gerenciando.php">
                            <input hidden="" name="CPF" value="<?php echo $arr["cpf_paciente"];?>">
                            <input hidden="" name="data" value="<?php echo $arr["data_consulta"];?>">
                            <input type="submit" style="width:25px; height:25px" name="botao" id="botao" value="X   Ficha"></form></td>
                		<td align="center"><form name="gerenciando" method="POST" action="alterar_agendar.php">
                            <input hidden="" name="name" value="<?php echo $arr["paciente"];?>">
                            <input hidden="" name="CPF" value="<?php echo $arr["cpf_paciente"];?>">
                            <input hidden="" name="prioridade" value="<?php echo $arr["prioridade"];?>">
                            <input hidden="" name="data" value="<?php echo $arr["data_consulta"];?>">
                            <input hidden="" name="tipo" value="<?php echo $arr["tipo"];?>">
                            <input hidden="" name="sus" value="<?php echo $arr["numero_sus"];?>">
                            <input type="submit" style="width:25px; height:25px" name="botao" id="botao" value="A   Ficha"></form></td>	
            		</tr>

            <?php    }
            ?>
        </tbody>
    </table>        
    </body>
</html>
