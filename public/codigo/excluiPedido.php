<?php

include_once "conecta.php"; 
if(!empty($_POST)){

	if(isset($_POST['codigo'])){

		$cod = $_POST['codigo'];

		 $insert = "insert into backup_pedido (tamanho, nome_sabor, tipo_sabor, nome, endereco, bairro)
				select p.tamanho,s.nome_sabor,s.tipo_sabor, c.nome, c.endereco,
				c.bairro
				from pedido p, cliente c, sabor s
				where p.id_cli = c.id_cli
				and p.id_sabor = s.id_sabor
				and p.id_pedido = $cod";

		$sql = "DELETE FROM pedido WHERE `id_pedido`=$cod";

		if((mysqli_query($conn,$insert))&&(mysqli_query($conn,$sql))){			
			echo "<script type='text/javascript'>";
            		echo "alert('Registro apagado!');"; 
            		echo "location.href = 'acompanharPedido.php';"; 
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