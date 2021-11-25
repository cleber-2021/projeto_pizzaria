<?php

include_once './cadastroSabor.php';
$cadastroSabor = new cadastroSabor();

    function __construct() {
        $this->db = new mysqli("localhost", "root", "voale@123", "projeto_pizzaria", "3306");
        //$this->db = new mysqli("localhost", "root", "", "trabalhophp", "3307");
        if (mysqli_connect_errno())//retorna o numero do erro
//mensagem de erro
            echo "Não foi possivel conectar-se ao db" . mysqli_connect_errno();
    }

if (!empty($_POST)) {
    $cod = $_POST['codigo'];
    $sabor = $_POST['sabor'];
    $ingredientes = $_POST['ingredientes'];
    $tipo = $_POST['tipo_sabor'];
    /*$imagem = $_POST['imagem_pizza'];*/
       


    if (isset($_POST['Atualizar'])){
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


}

?>