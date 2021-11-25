<?php

include_once "conecta.php"; 
if(!empty($_POST)){

	if(isset($_POST['codigo'])){

		$cod = $_POST['codigo'];

		$insert = "insert into backup_sabor (nome_sabor, ingredientes_sabor, tipo_sabor)
					select nome_sabor, ingredientes_sabor, tipo_sabor from sabor where id_sabor = $cod ";

		$sql = "DELETE FROM sabor WHERE `id_sabor`=$cod";

		if((mysqli_query($conn, $insert)) && (mysqli_query($conn, $sql))){			
			echo "<script type='text/javascript'>";
            		echo "alert('Registro apagado!');"; 
            		echo "location.href = 'cadastro.php';"; 
        	echo "</script>";
		}
		else
			echo "Erro: " . $sql . "<br>" . mysqli_error($conn);

		mysqli_close($conn);
	}	
}
else
	echo "<br> Não houve submit no formulário.";
?>