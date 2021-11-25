<?php

include_once "conecta.php"; //inclui arquivo de conexão com BD

//verificar se a variável POST não está vazia
//ou seja, se houve um submit no form
if(!empty($_POST)){

	$cod = $_POST['codigo'];
	//verificar se as variaveis existem (se foram definidas)
	if(isset($_POST['descricao']) && isset($_POST['valor'])){
		//pegando as informações do formulário
		$desc = $_POST['descricao'];
		$val = $_POST['valor'];

		$sql= "UPDATE valores SET descricao = '$desc', valor = $val
                WHERE id_valor = $cod";

		if(mysqli_query($conn, $sql)){
			echo "<script type='text/javascript'>";
            	echo "alert('Registro alterado com sucesso!');"; //alerta em tela
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