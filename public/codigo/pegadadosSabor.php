<?php

include_once './cadastroSabor.php';
$cadastroSabor = new cadastroSabor();


if (!empty($_POST)) {
    $sabor = $_POST['sabor'];
    $ingredientes = $_POST['ingredientes'];
    $tipo = $_POST['tipo_sabor'];
    /*$imagem = $_POST['imagem_pizza'];*/
       


    if (isset($_POST['Atualizar'])){
    	$cod = $_POST['codigo'];
    	$cadastroSabor->atualizar($cod, $sabor, $ingredientes, $tipo);
    }

    if (isset($_POST['Excluir'])){
    	$cod = $_POST['codigo'];
    	$cadastroSabor->deletar($cod);
    }
    
    if (isset($_POST['Salvar'])) {
        $cadastroSabor->adicionar($sabor, $ingredientes, $tipo);
    }
}

?>
      