<?php

class cadastroSabor {

    
    public $sabor;
    public $ingredientes;
    public $tipo;
    public $cod;
    public $db;

    function __construct() {
        $this->db = new mysqli("localhost", "root", "voale@123", "projeto_pizzaria", "3306");
        
        if (mysqli_connect_errno())//retorna o numero do erro
//mensagem de erro
            echo "Não foi possivel conectar-se ao db" . mysqli_connect_errno();
    }

    function adicionar($sabor, $ingredientes, $tipo) {
        $resultado = $this->db->query("insert into sabor (nome_sabor, ingredientes_sabor, tipo_sabor) value ('$sabor','$ingredientes',
            '$tipo')");
        if ($resultado) {
            $this->db->commit(); //se deu certo
            echo "<script type='text/javascript'>";
            echo "alert('Novo registro incluído com sucesso!');";
            echo "location.href = 'sabor.php';";
            echo "</script>";
            return 1;
        } else {
            $this->db->rollback();
            echo "<script type='text/javascript'>";
            echo "alert('Não foi possivel inserir o registro!');";
           echo "location.href = 'sabor.php';";
            echo "</script>";
            return 0;
        }
    }

    function atualizar($cod,$sabor, $ingredientes, $tipo){
        $resultado = $this->db->query("update sabor set nome_sabor='$sabor', ingredientes='$ingredientes',
                                        tipo_sabor='$tipo' where id_sabor = $cod");
        if ($resultado) {
            $this->db->commit(); //se deu certo
            echo "<script type='text/javascript'>";
            echo "alert('Registro atualizado com sucesso!');";
            echo "location.href = 'sabor.php';";
            echo "</script>";
            return 1;
        } else {
            $this->db->rollback();
            echo "<script type='text/javascript'>";
            echo "alert('Não foi possivel atualizar o registro! $cod, $sabor,$ingredientes,$tipo');";
            echo "location.href = 'sabor.php';";
            echo "Erro:  . $sql . mysqli_error($conn);";
            echo "</script>";
            return 0;
        }
    }

    function deletar($cod){
        $resultado = $this->db->query("delete from sabor where id_pizza = $cod");
        
        if ($resultado) {
            $this->db->commit(); //se deu certo
            echo "<script type='text/javascript'>";
            echo "alert('Registro excluido com sucesso!');";
            echo "location.href = 'sabor.php';";
            echo "</script>";
            return 1;
        } else {
            $this->db->rollback();
            echo "<script type='text/javascript'>";
            echo "alert('Não foi possivel excluir o registro! $cod');";
            echo "location.href = 'sabor.php';";
            echo "Erro:  . $sql . mysqli_error($conn);";
            echo "</script>";
            return 0;
        }

    }

    }
 


?>