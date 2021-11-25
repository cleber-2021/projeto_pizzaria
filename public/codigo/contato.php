<!DOCTYPE php>
<html lang="pt-br">
    <head>

        <title>Game of Pizzas/cadastro</title>


        <meta charset="utf-8">

        <link rel="shortcut icon" href=".././imagens/fundopizza.jpg">
        <link rel="stylesheet" href= ".././css/bootstrap.min.css" >

    </head>

    <body>
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href=".././index.php">Game Of Pizzas</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
              <li class="nav-item active">
                <a class="nav-link" href=".././index.php">Início <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href=".././codigo/promocoes.php">Promoções</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href=".././codigo/pizzas.php">Pizzas</a>
              </li>
                <li class="nav-item">
                <a class="nav-link" href=".././codigo/contato.php">Cadastro<span class="sr-only">(current)</span></a>
              </li>
                      <?php
                      $altera = false;
                    session_start();
                    if (isset($_SESSION['nomeUsuario'])){     
                     if($_SESSION['nomeUsuario']=='adm'){
                        echo "
                          <li class='nav-item'>
                             <a class='nav-link' href='.././codigo/cadastro.php'>Novo Sabor<span class='sr-only'>(current)</span></a>
                          </li>
                          <li class='nav-item'>
                             <a class='nav-link' href='.././codigo/cadastroValores.php'>Editar Valores<span class='sr-only'>(current)</span></a>
                          </li>
                          <li class='nav-item'>
                             <a class='nav-link' href='.././codigo/acompanharPedido.php'>Acompanhar Pedido<span class='sr-only'>(current)</span></a>
                          </li>";
                         }
                         else 
                          echo "<li class='nav-item'>
                                  <a class='nav-link' href='.././codigo/acompanharPedidoCliente.php'>Acompanhar Pedido<span class='sr-only'>(current)</span></a>
                                </li>";
                        }?>
                        </ul>
                      <?php
                         
                       if (isset($_SESSION['nomeUsuario'])) {
                           echo"<form class='form-inline my-2 my-lg-0' action='.././codigo/logout.php' method='post'>           
                                <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Sair</button>
                                </form>";      
                        ?> 
            </ul 
          </div>
        </nav>
                         <?php } ?>
                    <?php
                        if (!isset($_SESSION['nomeUsuario'])) {
                           echo"<form class='form-inline my-2 my-lg-0' action='.././codigo/LoginPedidoDoce.php' method='post'>              
                            <button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Entrar</button>
                            </form>";               
                          ?>      
          </div>
        </nav>
                               <?php } ?>
          </div>
        </nav>

        <br>

          <?php

          $servidor = 'localhost';
          $usuario = 'root';
          $senha = 'voale@123';
          $banco = 'projeto_pizzaria';
          $conn = new mysqli($servidor, $usuario, $senha, $banco, "3306");
          if (isset($_SESSION['nomeUsuario'])){
            /**
             * ao acessar a pagina de cadastro, caso usuario estaja logado
             * o sistema preenche os campos com os dados dele, para que algum dado possa ser alterado
             * inicialisa a variavel $altera como true, para fazer as validações dentro do forme, e fazer a inclusão
             * ou o update dependendo do valor de $altera
             */

            $altera = true;
              $selecionacli = mysqli_query($conn, "SELECT * FROM cliente c, autenticacao a WHERE c.id_cli = a.id_cli and a.nome_usuario='". $_SESSION['nomeUsuario'] ."'");

            if(mysqli_num_rows($selecionacli) == 1){
              $cli = mysqli_fetch_array($selecionacli);
              $cod = $cli['id_cli'];
              $nome = $cli['nome'];
              $tel = $cli['telefone'];
              $email = $cli['email'];
              $endereco = $cli['endereco'];
              $bairro = $cli['bairro'];
              $nomeUsuario = $cli['nome_usuario'];
              $senha = $cli['senha'];
          }
        }

          ?>

    <div class="container">
            <h2>
              <p class="sobre">Faça seu cadastro para realizar o seu pedido.</p><br>
            </h2>
          <form  method="post" <?php if($altera) { echo 'action="alteraCliente.php"';} else { echo 'action="./pegadadoscliente.php"'; }?> autocomplete>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputAddress">Nome</label>
                  <input type="text" class="form-control" name="nome" placeholder="Nome Sobrenome" value="<?php if($altera) echo $nome; ?>" required>
              </div>
              <div class="form-group col-md-6">
                  <label for="inputAddress">Telefone</label>
                  <input type="tel" name="telefone"  class="form-control" placeholder="(xx)xxxxx-xxxx"  pattern="^\(?\d{2}\)\d{5}[-\s]\d{4}.*?$" value="<?php if($altera) echo $tel; ?>" required>
              </div>
          </div>
          <div class="form-group">
              <label for="inputAddress">Endereço</label>
              <input type="text" name="endereco" class="form-control" placeholder="Rua, nº" value="<?php if($altera) echo $endereco; ?>" required>
            </div>
              <div class="form-group">
              <label for="inputAddress">Bairro</label>
              <input type="text" name="bairro" class="form-control" placeholder="Bairro" value="<?php if($altera) echo $bairro; ?>" required>
            </div>
            <div class="form-group">
              <label for="inputAddress2">Complemento</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartamento, casa ...">
            </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputEmail4">E-mail</label>
                <input type="email" class="form-control" name="email" placeholder="Email" required pattern="^[a-zA-Z0-9_\.-]{2,}@([A-Za-z0-9_-]{2,}\.)+[A-Za-z]{2,4}$" value="<?php if($altera) echo $email; ?>" required>
              </div>
          </div>
          <div class="form-row">
              <div class="form-group col-md-6">
                <label for="inputUsuario">Usuário</label>
                <input type="text" name="usuario" class="form-control" placeholder="Usuario" value="<?php if($altera) echo $nomeUsuario; ?>" required>
              </div>
              <div class="form-group col-md-6">
                <label for="inputPassword4">Senha</label>
                <input type="password" class="form-control" name="senha" placeholder="Password" value="<?php if($altera) echo $senha; ?>" required>
              </div>
            </div>
            <?php 
               if ($altera) {
                echo "<div class='form-row'>
                <div class='form-group col-md-6'>
                    <label for='inputAddress'>Codigo do cliente</label>
                    <input type='text' class='form-control' name='codigo' value= '$cod' required>
              </div>
            </div>
                 <button type='submit' class='btn btn-primary'value='update' name='Atualizar'>Atualizar</button>";}
                else { 
                echo " <button type='submit' class='btn btn-primary'value='Salvar' name='Salvar'>Salvar</button>";}
                  ?>
          </form>             
    </div>

        <br>
  


  <br><br><br><br><br><br>

  <section>...</section>
      <footer class="my-5 pt-5 text-muted text-center text-small">
      &copy; Cléber Rocha - Game of Pizzas - projeto PHP/HTML - 2021
         </footer>
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>      


        
    </body>

</html>