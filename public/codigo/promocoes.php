<!DOCTYPE php>
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
                <a class="nav-link" href=".././codigo/pizzas.php" >Pizzas</a>
              </li>
               <li class="nav-item">
                <a class="nav-link" href=".././codigo/contato.php">Cadastro</a>
              </li>
                    <?php
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
         <h2>Algumas de nossas promoções:</h2>
            


<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

  

<section>...</section>
      <footer class="my-5 pt-5 text-muted text-center text-small">
      &copy; Cléber Rocha - Game of Pizzas - projeto PHP/HTML - 2021
         </footer>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>     
    </body>






</html>