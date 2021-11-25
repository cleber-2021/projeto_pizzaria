<?php

include_once "conecta.php"; //inclui arquivo de conexão com BD

//verificar se a variável POST não está vazia
//ou seja, se houve um submit no form
if(!empty($_POST)){
	//verificar se as variaveis existem (se foram definidas)
	if(isset($_POST['sabor']) && isset($_POST['ingredientes']) && isset($_POST['tipo'])){
		//pegando as informações do formulário
		$sabor = $_POST['sabor'];
		$ingred = $_POST['ingredientes'];
		$tipo = $_POST['tipo'];

		//criando comando SQL:
		$sql = "INSERT INTO sabor (nome_sabor, ingredientes_sabor, tipo_sabor) VALUES ('$sabor','$ingred','$tipo')";

		//executando insert:
		if(mysqli_query($conn, $sql)){
			//echo "Novo registro incluído com sucesso. <br>";
			echo "<script type='text/javascript'>";
            		echo "alert('Novo registro incluído com sucesso!');"; //alerta em tela
            		echo "location.href = 'cadastro.php';"; //redirecionamento
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