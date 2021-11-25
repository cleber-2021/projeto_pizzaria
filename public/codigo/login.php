
            <?php
            
            session_start();
            if ((!isset($_SESSION['nomeUsuario'])) && (empty($_POST))) {
                return header('location: LoginPedidoDoce.php');
            } else {
                include_once 'Login.class.php';

                
                $nome = $_POST["usuario"];
                $senha = $_POST["senha"];

                //cria duas variáveis para armazenar as informações do BD:
                $nomeBanco = "";
                $senhaBanco = "";
                $cod_cli = "";
                $nome_cli = "";
                $endereco = "";
                $bairro = "";
             

                //verifica se os dados do form existem no BD:
                $login = new Login();
                $resultado = $login->buscarNome($nome);

                while ($linha = mysqli_fetch_assoc($resultado)) {
                    $nomeBanco = $linha['nome_usuario'];
                    $senhaBanco = $linha['senha'];
                    $cod_cli = $linha['id_cli'];
                    
                }

                
                if ($nome == $nomeBanco && $senha == $senhaBanco) {
                    echo "<br>Login efetuado com sucesso!";

                    //setando cookie para o usuário:
                    setcookie("usuario", $nome, time() + 3600);

                    //setando sessão:
                    $_SESSION['nomeUsuario'] = $nomeBanco;
                    $_SESSION['senha'] = $senhaBanco;
                    $_SESSION['id_cli'] = $cod_cli;
                   
                   return header('location: pizzas.php');
                } else {
                    ?>
                    <html>
                    <!DOCTYPE html>
                <html lang="pt-br">
                    <head>

                        <title>Game of Pizzas/promocoes</title>


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
                                <a class="nav-link" href=".././codigo/contato.php">Cadastro</a>
                              </li>
                            </ul>
                   <?php
                    
                    if (isset($_SESSION['nomeUsuario'])){     
                     if($_SESSION['nomeUsuario']=='adm'){
                        echo "
                          <li class='nav-item'>
                             <a class='nav-link' href='.././codigo/sabor.php'>Novo Sabor<span class='sr-only'>(current)</span></a>
                          </li>
                          <li class='nav-item'>
                             <a class='nav-link' href='.././codigo/acompanharPedido.php'>Acompanhar Pedido<span class='sr-only'>(current)</span></a>
                          </li>";
                         }
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
                      <br><br>
                    <div class="container">
                        <form action="LoginPedidoDoce.php">
                            <h2>Usuário e/ou senha incorreto(a)!</h2>
                            <br><button class='btn btn-outline-success my-2 my-sm-0' type='submit'>Voltar<a href='LoginPedidoDoce.php'></a></button>
                        </form>
                    </div>
                    <?php
                }
            }
            ?>

            
