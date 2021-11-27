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
                    session_start();
                    if (isset($_SESSION['nomeUsuario'])){     
                     if($_SESSION['nomeUsuario']=='adm'){
                        echo "
                          <li class='nav-item'>
                             <a class='nav-link' href='.././codigo/cadastro.php'>Novo Sabor<span class='sr-only'>(current)</span></a>
                          </li>
                          <li class='nav-item'>
                             <a class='nav-link' href='.././codigo/acompanharPedido.php'>Acompanhar Pedido<span class='sr-only'>(current)</span></a>
                          </li>
                          </ul>"                        ;
                         }
                        }?>                         
                        
                      <?php
                         
                       if (isset($_SESSION['nomeUsuario'])) {
                           echo"<li class='nav-item'>
                                   <a class='nav-link' href='.././codigo/acompanharPedidoCliente.php'>Acompanhar Pedido<span class='sr-only'>(current)</span></a>
                                </li>
                                </ul>
                                <form class='form-inline my-2 my-lg-0' action='.././codigo/logout.php' method='post'>           
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

	<!-- EDIÇÃO de um registro específico: -->
	 <?php
      $servidor = 'localhost';
      $usuario = 'root';
      $senha = 'voale@123';
      $banco = 'projeto_pizzaria';
      $conn = new mysqli($servidor, $usuario, $senha, $banco, "3306");

       

        if (isset($_POST['edit'])) {
          $cod = $_POST['codigo']; //pega o código que foi passado por método POST
          $altera = true;
          $selecionapedido = mysqli_query($conn,"select p.id_pedido, p.tamanho,s.nome_sabor, c.nome,
                                               c.endereco, c.bairro, concat('R$ ',p.valor_total) as valor
                                               from pedido p, cliente c, sabor s
                                               where p.id_cli = c.id_cli
                                               and p.id_sabor = s.id_sabor;");
            

          if(mysqli_num_rows($selecionapedido) == 1){
            $cli = mysqli_fetch_array($selecionapedido);
            $cod = $cli['id_pedido'];
            $nome_sabor = $cli['nome_sabor'];
            $tamanho = $cli['tamanho'];
            $nome_cliente = $cli['nome'];
            $endereco = $cli['endereco'];
            $bairro = $cli['bairro'];
            $valor = $cli['valor'];

          }
        }
        ?>


        <br>
        <br>
        <br>

 <table class="table table-dark"><!-- Tabela com registros inseridos -->
    <thead>
      <tr>
       
        <th>Sabor</th>
        <th>Tamanho</th>
        <th>Valor total</th>
         <th colspan="2">Andamento</th>
      </tr>
    </thead>    

     <?php
     if (isset($_SESSION['nomeUsuario'])){
          $cliente = $_SESSION['id_cli'];
          $consulta = mysqli_query($conn, "select p.id_pedido, p.tamanho,s.nome_sabor, c.nome, c.endereco,
                                               c.bairro, p.valor_total as valor, s.tipo_sabor, andamento
                                               from pedido p, cliente c, sabor s
                                               where p.id_cli = c.id_cli
                                               and c.id_cli = ". $cliente ."
                                               and p.id_sabor = s.id_sabor");
    $gigante = 0;
    $grande = 0;
    $media = 0;
    $doce = 0;
    $salgada = 0;
   
    while ($registro = mysqli_fetch_array($consulta)){ ?>

    <tr>
      <td><?php echo $registro['nome_sabor']; ?></td>
      <td><?php echo $registro['tamanho'];?></td>
      <td><?php echo 'R$ '.number_format((float)$registro['valor'],2,'.',''); ?></td>
      <td><?php echo $registro['andamento'];?></td>
    </tr>

    <?php
    } }?> 
  </table>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

 <section>...</section>
      <footer class="my-5 pt-5 text-muted text-center text-small">
      &copy; Cléber Rocha - Game of Pizzas - projeto PHP/HTML - 2021
         </footer>
    </body>

</html>