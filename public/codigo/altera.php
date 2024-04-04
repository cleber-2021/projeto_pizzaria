<?php

include_once "conecta.php"; //inclui arquivo de conexão com BD

//verificar se a variável POST não está vazia
//ou seja, se houve um submit no form
if(!empty($_POST)){

	$cod = $_POST['codigo'];
	//verificar se as variaveis existem (se foram definidas)
	if(isset($_POST['sabor']) && isset($_POST['ingredientes']) && isset($_POST['tipo'])){
		//pegando as informações do formulário
		$sabor = $_POST['sabor'];
		$ingred = $_POST['ingredientes'];
		$tipo = $_POST['tipo'];

		$sql= "UPDATE sabor SET nome_sabor = '$sabor', ingredientes_sabor = '$ingred', tipo_sabor = '$tipo'
                WHERE id_sabor = $cod"; //valores inteiros não vão com aspas

		if(mysqli_query($conn, $sql)){
			echo "<script type='text/javascript'>";
            	echo "alert('Registro alterado com sucesso!');"; //alerta em tela
            	echo "location.href = 'cadastro.php';"; //redirecionamento
        	echo "</script>";
		}
		else
			echo "Erro: " . $sql . "<br>" . mysqli_error($conn);

		//fechando conexão
		mysqli_close($conn);
	}	



//git hub 23:46 03/04/2024

}
else
	echo "<br> Não houve submit no formulário.";


?>