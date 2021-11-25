<?php

include_once './cadastroCliente.php';
$cadastroCliente = new cadastroCliente();


if (!empty($_POST)) {
   $nome = $_POST['nome'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $endereco = $_POST['endereco'];
    $bairro = $_POST['bairro'];
    $nome_usuario = $_POST['usuario'];
    $senha_usuario = $_POST['senha'];
    
    if (isset($_POST['Salvar'])) {
          $servidor = 'localhost';
          $usuario = 'root';
          $senha = 'voale@123';
          $banco = 'projeto_pizzaria';
          
           $conn = new mysqli($servidor, $usuario, $senha, $banco, "3306");
           $consulta = mysqli_query($conn, "SELECT nome_usuario FROM autenticacao");
           while ($registro = mysqli_fetch_array($consulta)){ 

            if ($nome_usuario == $registro['nome_usuario']){
            echo "<script type='text/javascript'>";
            echo "alert('Nome de usuario já existe, cadastre outro!');"; 
            echo "location.href = 'contato.php';";
            echo "</script>";
            exit;
            } }
        $cadastroCliente->adicionar($nome, $telefone, $email, $endereco, $bairro,$nome_usuario,$senha_usuario);
    
}

}

?>
          

