<?php

class cadastroCliente {

    public $nome;
    public $telefone;
    public $email;
    public $endereco;
    public $bairro;
    public $nome_usuario;
    public $senha;
    public $cod;
    public $db;

    function __construct() {
        $this->db = new mysqli("localhost", "root", "voale@123", "projeto_pizzaria", "3306");
        
        if (mysqli_connect_errno())//retorna o numero do erro
//mensagem de erro
            echo "Não foi possivel conectar-se ao db" . mysqli_connect_errno();
    }

    function adicionar($nome, $telefone, $email, $endereco, $bairro, $nome_usuario, $senha) {
        
        $resultado = $this->db->query("insert into cliente (nome, telefone,"
                . " email, endereco, bairro)"
                . " value ('$nome','$telefone', '$email', '$endereco', '$bairro')");
        $autentica = $this->db->query("insert into autenticacao (id_cli, nome_usuario, senha) value ((select id_cli from cliente where nome = '$nome'), '$nome_usuario','$senha')");
        if ($resultado) {
            $this->db->commit(); //se deu certo
            echo "<script type='text/javascript'>";
            echo "alert('Novo registro incluído com sucesso!');";
            echo "location.href = 'LoginPedidoDoce.php';";
            echo "</script>";                       
            return 1;
        } else {
            $this->db->rollback();
            echo "<script type='text/javascript'>";
            echo "alert('Não foi possivel inserir o registro!');";
            echo "location.href = 'contato.php';";
            echo "</script>";
            return 0;
        }
    }
    

    

 
}

?>
