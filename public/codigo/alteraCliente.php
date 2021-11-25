<?php

include_once "conecta.php"; //inclui arquivo de conexão com BD

//verificar se a variável POST não está vazia
//ou seja, se houve um submit no form
if(!empty($_POST)){

	$cod = $_POST['codigo'];
	//verificar se as variaveis existem (se foram definidas)
	if(isset($_POST['nome']) && isset($_POST['telefone']) && isset($_POST['email'])&& isset($_POST['endereco']) && isset($_POST['usuario']) && isset($_POST['senha'])){
		//pegando as informações do formulário
		 	$nome = $_POST['nome'];
		    $telefone = $_POST['telefone'];
		    $email = $_POST['email'];
		    $endereco = $_POST['endereco'];
		    $bairro = $_POST['bairro'];
		    $nome_usuario = $_POST['usuario'];
		    $senha = $_POST['senha'];

		$sql= "update cliente c, autenticacao a
				 set c.nome='$nome', c.telefone='$telefone', c.email='$email', c.endereco='$endereco',
                     c.bairro='$bairro',
                     a.nome_usuario='$nome_usuario',a.senha='$senha'
                     where a.id_cli = c.id_cli
                     	   and c.id_cli = $cod"; //valores inteiros não vão com aspas

		if(mysqli_query($conn, $sql)){
			echo "<script type='text/javascript'>";
            	echo "alert('Registro alterado com sucesso!');"; //alerta em tela
            	echo "location.href = 'contato.php';"; //redirecionamento
        	echo "</script>";
		}
		else
			echo "Erro: " . $sql . "<br>" . mysqli_error($conn);

		//fechando conexão
		mysqli_close($conn);
	}	
}
else
	echo "<br> Não houve submit no formulário.";


?>