<?php
	session_start();
	session_destroy(); //destruindo a sessão
	
	return header('location: LoginPedidoDoce.php');
	

?>