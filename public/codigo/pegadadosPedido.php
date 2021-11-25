<?php
include_once './cadastroPedido.php';
include_once './cadastroCliente.php';
include_once './conecta.php';
$cadastroPedido = new cadastroPedido();
$nome_cliente = new cadastroCliente();




session_start();
if (isset($_SESSION['nomeUsuario'])) {   
    $cod_cli = ($_SESSION['id_cli']);
    
}

/*if (!empty($_POST)) {

 }*/
    if (isset($_POST['Pedir'])) {
      $tamanho_pizza = $_POST['tamanho_sabor'];
      $id_sabor = $_POST['codigo'];

       $Valores = mysqli_query($conn,"select * from valores where descricao = '$tamanho_pizza'");
       $tele = mysqli_query($conn,"select * from valores where descricao = 'Tele-Entrega'");
       $reg = mysqli_fetch_array($Valores);
       $tel = mysqli_fetch_array($tele);
       $valor = $reg['valor'] + $tel['valor'];      
        
        $cadastroPedido->adicionarPedido ($id_sabor, $cod_cli, $tamanho_pizza, $valor);
    }



?>

