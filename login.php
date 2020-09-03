<?php
include ("Connection.php");
$cpf = $_POST["CPF"];
$senha = $_POST["senha"];

$result = pg_query($dbconn, "SELECT * FROM funcionarios where cpf='$cpf' and senha='$senha'");
$qtd = (pg_num_rows ($result));
if ($qtd==1) {
	header("Location:principal.php");
}else{
	header("Location:index.php?botao='Login incorreto!'");
}
?>