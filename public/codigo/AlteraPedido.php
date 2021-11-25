<?php

include_once "conecta.php"; //inclui arquivo de conexão com BD

//verificar se a variável POST não está vazia
//ou seja, se houve um submit no form
if(!empty($_POST)){

	$cod = $_POST['codigo'];
	//verificar se as variaveis existem (se foram definidas)
	if(isset($_POST['andamento_pizza'])){
		//pegando as informações do formulário
		$andamento = $_POST['andamento_pizza'];

		$sql= "UPDATE pedido SET andamento = '$andamento'
                WHERE id_pedido = $cod"; //valores inteiros não vão com aspas

		if(mysqli_query($conn, $sql)){
			echo "<script type='text/javascript'>";
            	echo "alert('Registro alterado com sucesso!');"; //alerta em tela
            	echo "location.href = 'AcompanharPedido.php';"; //redirecionamento
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