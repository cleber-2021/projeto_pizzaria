<!DOCTYPE php>
<html lang="pt-br">
    <head>

        <title>Game of Pizzas/cadastro_valores</title>


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
                             <a class='nav-link' href='.././codigo/cadastroValores.php'>Editar Valores<span class='sr-only'>(current)</span></a>
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

	<!-- EDIÇÃO de um registro específico: -->
	 <?php
      $servidor = 'localhost';
      $usuario = 'root';
      $senha = 'voale@123';
      $banco = 'projeto_pizzaria';
      $conn = new mysqli($servidor, $usuario, $senha, $banco, "3306");

        $altera = false;

        if (isset($_POST['edit'])) {
          $cod = $_POST['codigo']; //pega o código que foi passado por método POST
          $altera = true;
          $selecionacli = mysqli_query($conn, "SELECT * FROM valores WHERE id_valor=$cod");

          //echo "<pre>"; var_dump($selecionacli); echo "</pre>";
          //if (count($selecionacli) == 1 ) { //se o select retornou algum registro de acordo com o código informado
          if(mysqli_num_rows($selecionacli) == 1){
            $cli = mysqli_fetch_array($selecionacli);
            $cod = $cli['id_valor'];
            $descr = $cli['descricao'];
            $valor_ = $cli['valor'];
          }
        }?>

	 <div class="container">
            <h2>
              <p class="sobre">Cadastrar valores.</p><br>
            </h2>
          <form  method="post" <?php if($altera) { echo 'action="alteraValor.php"';} else { echo 'action="insereValor.php"'; } ?> autocomplete>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputAddress">Descrição</label>
                  <input type="text" class="form-control" name="descricao" placeholder="tamanho/entrega" value="<?php if($altera) echo $descr; ?>" required>
              </div>
          </div>
          <div class="form-row">
           <div class="form-group col-md-6">
                  <label for="inputAddress">Valor</label>
                  <input type="number" step = "any" class="form-control" name="valor" placeholder="0,00" value="<?php if($altera) echo $valor; ?>" required>
              </div>
          </div>
          <?php 
                if ($altera) {
                echo "<div class='form-row'>
	            	<div class='form-group col-md-6'>
	                  <label for='inputAddress'>Codigo da Descricao</label>
	                  <input type='text' class='form-control' name='codigo' value= '$cod' required>
		        	</div>
	         	</div>
                 <button type='submit' class='btn btn-primary'value='update' name='Atualizar'>Atualizar</button>";}
                else { 
                echo " <button type='submit' class='btn btn-primary'value='Salvar' name='Salvar'>Salvar</button>";}
                  ?>
          </form>             
    </div>


	<br><br><br>

 <table class="table table-dark"><!-- Tabela com registros inseridos -->
    <thead>
      <tr>
        <th>Descrição</th>
        <th>Valor</th>
        <th colspan="1">Ação</th>
      </tr>
    </thead>    

     <?php 

    $consulta = mysqli_query($conn, "SELECT * FROM VALORES");
    while ($registro = mysqli_fetch_array($consulta)){ ?>

    <tr>
      <td><?php echo $registro['descricao']; ?></td>
      <td><?php echo $registro['valor']; ?></td>
      <td>
      <?php echo '<form method="post" action="cadastroValores.php">';
                  echo '<input type="hidden" name="codigo" value="'.$registro['id_valor'].'"/>';    
                  echo '<input type="submit"  value="Editar" name="edit"/>';
                  echo '</form>'; ?>
            </td>
         <td>
    </tr>
    <?php } ?> 
  </table>
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