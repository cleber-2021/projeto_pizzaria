<?php

class cadastroPedido {

    public $id_sabor;
    public $tamanho;
    public $valor;
    public $id_cli;
    public $db;

    function __construct() {
        $this->db = new mysqli("localhost", "root", "voale@123", "projeto_pizzaria", "3306");
        //$this->db = new mysqli("localhost", "root", "", "trabalhophp", "3307");
        if (mysqli_connect_errno())//retorna o numero do erro
        //mensagem de erro
            echo "Não foi possivel conectar-se ao db" . mysqli_connect_errno();
    }

    function adicionarPedido($id_sabor, $id_cli, $tamanho, $valor) {

       

        $resultado = $this->db->query("insert into pedido (id_sabor, id_cli, tamanho, valor_total)"
                . " value ($id_sabor, $id_cli, '$tamanho', $valor)");
        if ($resultado) {
            $this->db->commit(); //se deu certo
            echo "<script type='text/javascript'>";
            echo "alert('Pedido realizado com sucesso!');";
            echo "location.href = '../index.php';";
            echo "</script>";
            return 1;
        } else {
            $this->db->rollback();
            echo "<script type='text/javascript'>";
            echo "alert('Não foi possivel realizar o pedido!');";
            /*echo "location.href = '../index.php';";*/
            echo "</script>";
            return 0;
        }
    }
    
     function buscar() {
        session_start();
        if (isset($_SESSION['nomeUsuario'])) {

            $nome = ($_SESSION['nomeUsuario']);
        }

        $result = $this->db->query("Select * from pedido where cliente = '$nome'");
        
        while ($dados = $result->fetch_array()) {
            echo $result;
        }
    }

}
?>

