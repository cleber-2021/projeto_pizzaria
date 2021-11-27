<!DOCTYPE php>
<html lang="pt-br">
    <head>

        <title>Game of Pizzas/salgada</title>


        <meta charset="utf-8">

        <link rel="shortcut icon" href=".././imagens/fundopizza.jpg">
        <link rel="stylesheet" href= ".././css/bootstrap.min.css" >

    </head>

    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <a class="navbar-brand" href=".././index.php">Game Of Pizzas</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
           aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
        <p> <h1 class="doceSalgada">Pizzas Salgadas</h1></p>
    <br>
    <br>
     <?php
     $servidor = 'localhost';
      $usuario = 'root';
      $senha = 'voale@123';
      $banco = 'projeto_pizzaria';
      $conn = new mysqli($servidor, $usuario, $senha, $banco, "3306");
    if (isset($_SESSION['nomeUsuario'])) {
      $usuario = $_SESSION['nomeUsuario'];
      $consulta = mysqli_query($conn, "SELECT C.NOME FROM  CLIENTE C, AUTENTICACAO A WHERE A.NOME_USUARIO = '$usuario' AND C.ID_CLI = A.ID_CLI");
      $registro = mysqli_fetch_array($consulta);      

        echo "<html><p> <h2 class='doceSalgada'>Bem vindo(a) ". $registro['NOME']. " </h2></p>"
        . "<form action='logout.php' method='post'>
                
                </form>";
        ?>

 
    <table class="table table-dark"><!-- Tabela com registros inseridos -->
    <thead>
      <tr>
        <th>Código</th>
        <th>Sabor</th>
        <th>Ingredientes</th>
        <th>Tipo</th>
        <th>Tamanho</th>
        <th colspan="2">Ação</th>
      </tr>
    </thead>    

     <?php 
     

    $consulta = mysqli_query($conn, "SELECT * FROM SABOR WHERE tipo_sabor = 'Salgada'");
    while ($registro = mysqli_fetch_array($consulta)){ ?>
 <form method="post" action="pegadadosPedido.php">
    <tr>
      <td><?php echo $registro['id_sabor']; ?></td>
      <td><?php echo $registro['nome_sabor']; ?></td>
      <td><?php echo $registro['ingredientes_sabor']; ?></td>
      <td><?php echo $registro['tipo_sabor']; ?></td>
      <td> 
            <select class="form-control" name= 'tamanho_sabor'>
             <?php
                $Valores = mysqli_query($conn, "SELECT id_valor, descricao FROM valores WHERE descricao <> 'Tele-entrega'");
                while ($reg = mysqli_fetch_array($Valores)){ 
              echo '<option value="'.$reg['descricao'].'">'.$reg['descricao'].'</option>';
            }?>
            </select>
      </td>
      <td>
            <?php
                echo '<input type="hidden" name="codigo" value="'.$registro['id_sabor'].'"/>';   
                echo '<input type="submit" class="btn btn-primary" value="Pedir" name="Pedir"/>';
             ?>
      </td>
    </tr>
    </form>
    <?php } ?> 
  </table>

    <?php }
    ?>
<div class="container">
    <?php
    if (!isset($_SESSION['nomeUsuario'])) {
        echo "<php><p><h2 class='doceSalgada'>Faça Login para realizar o pedido.</h2></p>
            
             <form action='LoginPedidoDoce.php' method='post'>
                <p class='doceSalgada'>
                    <input type='submit'class='btn btn-primary' value='Fazer Login' />
                </p>";
    }
    ?>
</div>

<div class="container">
          <p class="text-justify"><h4> Valores:</h4>
          <?php
                $Valores = mysqli_query($conn, "SELECT id_valor, descricao,  valor FROM valores");
                while ($reg = mysqli_fetch_array($Valores)){
                  echo '<h5>'.$reg['descricao'].' = ' . 'R$ '. number_format((float)$reg['valor'],2,'.','');

                }?>
          </p>
        </div>
    <br>
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





