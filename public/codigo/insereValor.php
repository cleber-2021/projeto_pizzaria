<?php

include_once "conecta.php"; //inclui arquivo de conexão com BD

//verificar se a variável POST não está vazia
//ou seja, se houve um submit no form
if(!empty($_POST)){
	//verificar se as variaveis existem (se foram definidas)
	if(isset($_POST['descricao']) && isset($_POST['valor'])){
		//pegando as informações do formulário
		$desc = $_POST['descricao'];
		$val = $_POST['valor'];

		//criando comando SQL:
		$sql = "INSERT INTO VALORES (descricao, valor) VALUES ('$desc', '$val')";

		//executando insert:
		if(mysqli_query($conn, $sql)){
			//echo "Novo registro incluído com sucesso. <br>";
			echo "<script type='text/javascript'>";
            		echo "alert('Novo registro incluído com sucesso!');"; //alerta em tela
            		echo "location.href = 'cadastroValores.php';"; //redirecionamento
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