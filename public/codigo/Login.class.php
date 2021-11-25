
<?php

include_once 'ConexaoBD.class.php';

class Login {

    function buscarNome($nome) {
        $db = new ConexaoBD();
        $db->conectar();
        return $db->query("SELECT * FROM autenticacao WHERE nome_usuario = '$nome'");
        $db->fechar();
    }

}
?>

