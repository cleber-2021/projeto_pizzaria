<?php

$servidor = 'localhost';
$usuario = 'root';
$senha = 'voale@123';
$banco = 'projeto_pizzaria';

//criando conexão com BD mysql
$conn = new mysqli($servidor, $usuario, $senha, $banco, "3306"); //3307 - lab

//caso algo dê errado, exibe uma mensagem de erro:
if(mysqli_connect_errno()) //retorna o código de erro da última chamada à função connect
							//zero indica que não ouve erro
	trigger_error(mysqli_connect_error());

	//trigger_error: gera uma mensagem a nível de usuário de erro/aviso/noticia
	//mysqli_connect_error: retorna uma string que descreve o erro. 
?>