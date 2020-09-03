<?php
include ("Connection.php");
$acao = $_POST["botao"];

#INSERT Fichas
if($acao == "Cadastrar ficha"){
	$name = $_POST["name"];
	$cpf = $_POST["CPF"];
	$data = $_POST["data"];
	$sus = $_POST["sus"];
	$prioridade = $_POST["prioridade"];
	$tipo = $_POST["profissional"];

	$result = pg_query($dbconn, "SELECT numero_ficha FROM Fichas where data_consulta='$data' and tipo='$tipo'");
	$ficha = (pg_num_rows ($result))+1;
	$resultPrioridade = pg_query($dbconn, "SELECT prioridade FROM Fichas where data_consulta='$data' and prioridade='$prioridade'");
	$qtdPrioridade = (pg_num_rows ($result));


	if($ficha<=15){
		if ($prioridade=="Não prioritário" and $qtdPrioridade>=10) {
			header("Location:principal.php?botao='Quantidade máxima de fichas não prioritárias marcadas para $tipo'");
		}else{
			$sql = "insert into Fichas(paciente, cpf_paciente, prioridade, data_consulta, tipo, numero_ficha, numero_sus)  values('$name', '$cpf', '$prioridade', '$data', '$tipo', '$ficha', '$sus')";
			$result = pg_query($dbconn, $sql);
			if($result){
				header("Location:principal.php?botao='Ficha adicionada com sucesso'");
			}
		}
	}else{
		header("Location:principal.php?botao='Quantidade máxima de fichas marcadas para $tipo'");
	}
}

#INSERT Funcionarios
else if($acao == "Cadastrar funcionario"){
	$name = $_POST["name"];
	$cpf = $_POST["CPF"];
	$senha = $_POST["senha"];
	$sql = "insert into funcionarios(nome, cpf, senha)  values('$name', '$cpf', '$senha')";
	$result = pg_query($dbconn, $sql);
	if($result){
		header("Location:principal.php?botao='Funcionario adicionado com sucesso'");
	}
}

#DELETE Ficha
else if($acao == "X   Ficha"){
	$cpf = $_POST["CPF"];
	$data = $_POST["data"];
	$sql = "DELETE from Fichas where cpf_paciente='$cpf' and data_consulta='$data'";
	$result = pg_query($dbconn, $sql);
	if($result){
	  header("Location:agendadas.php?botao='Ficha deletada com sucesso'");
	}
}

#DELETE Funcionário
else if($acao == "X   Funcionario"){
	$cpf = $_POST["CPF"];
	$senha = $_POST["senha"];
	$sql = "DELETE from funcionarios where cpf='$cpf'";
	$result = pg_query($dbconn, $sql);
	if($result){
	  header("Location:cadastrados.php?botao='Funcionario deletado com sucesso'");
	}
}

#UPDATE Fichas
else if($acao == "Salvar alterações"){
	$name = $_POST["name"];
	$cpf = $_POST["CPF"];
	$data = $_POST["data"];
	$sus = $_POST["sus"];
	$prioridade = $_POST["prioridade"];
	$tipo = $_POST["profissional"];
	$cpf_antigo = $cpf;
	$sql = "update Fichas set paciente='$name', cpf_paciente='$cpf', prioridade='$prioridade', data_consulta='$data', tipo='$tipo', numero_sus='$sus' where cpf_paciente='$cpf_antigo'";
	$result = pg_query($dbconn, $sql);
	if($result){
		header("Location:agendadas.php?botao='Ficha alterada com sucesso'");
	}
}

#UPDATE Funcionário
else if($acao == "Atualizar Cadastro"){
	$name = $_POST["name"];
	$cpf = $_POST["CPF"];
	$senha = $_POST["senha"];
	$cpf_antigo = $_POST["cpf_antigo"];
	$sql = "update funcionarios set nome='$name', cpf='$cpf', senha='$senha' where cpf='$cpf_antigo'";
	$result = pg_query($dbconn, $sql);
	if($result){
		header("Location:cadastrados.php?botao='Funcionario alterado com sucesso'");
	}
}
?>