<!DOCTYPE html>
<html>
<head>
	<title>C.M.V SAMU - 192</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="https://pro-staging.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-TXfwrfuHVznxCssTxWoPZjhcss/hp38gEOH8UPZG/JcXonvBQ6SlsIF49wUzsGno" crossorigin="anonymous">
</head>
<body class="bg-light">



<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="Logado.php"><i style="font-size: 2rem;" class="fal fa-car-mechanic"></i><b> C.M.V SAMU - 192</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <!-- Veiculos -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Veículos
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light " href="CadAmb.html">Adicionar</a>
          <a class="dropdown-item text-light" href="ConAmb.php">Verificar</a>
        </div>
      </li>

      <!-- Peças -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Peças
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light " href="CadPeca.html">Adicionar</a>
          <a class="dropdown-item text-light" href="ConPeca.php">Verificar</a>
        </div>
      </li>

      <!-- Estoque -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Estoque
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light " href="CadEstoque.html">Adicionar</a>
          <a class="dropdown-item text-light" href="ConEstoque.php">Verificar</a>
        </div>
      </li>

      <!-- Controle de manutenção -->
        <a class="nav-link" href="controle.php"  aria-haspopup="true" aria-expanded="false">
          Controle de Manutenção
        </a>
      
    </ul>
  </div>
</nav>

<div class="py-5">
  <div class="container">           

           <h2 class="text-danger" align="center">Estoque</h2><br>
            <table class="table table-striped">
              <thead>
                <tr class="bg-danger text-light">
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Quantidade</th>
                  <th scope="col">Local</th>
                  <th scope="col">Nota Fiscal</th>
                  <th scope="col">Valor R$</th>
                  <th scope="col">Data</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Apagar</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  include_once "Codigo.php";
                  $sql = $conexao->query("SELECT * FROM estoque");
                  while ($resultado = $sql->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                  <td><?php echo $resultado->IdEstoque; ?></td>

                  <?php
                    $sql2 = $conexao->query("SELECT * FROM pecas WHERE IdPeca = $resultado->NomePeca");
                    $nome = $sql2->fetch(PDO::FETCH_OBJ)
                  ?>
                  <td><?php echo $nome->NomePeca; ?></td>
                  
                  <td><?php echo $resultado->Quantidade; ?></td>
                  <td><?php echo $resultado->LocalCompra; ?></td>
                  <td><?php echo $resultado->NotaF; ?></td>
                  <td><?php echo $resultado->ValorCompra; ?></td>
                  <td><?php echo date('d/m/Y',strtotime($resultado->DataEstoque)); ?></td>

                  <td><a class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-<?php echo $resultado->IdEstoque;?>" ><i class="fas fa-edit"></i></a></td>
                  <td><a href="deletarEstoq.php?id=<?php echo $resultado->IdEstoque;?>" class="btn btn-outline-danger"><i class="fas fa-times-circle"></a></td>

                </tr>
                 <div class="modal fade" id="modal-<?php echo $resultado->IdEstoque;?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header bg-danger text-light">
              <h5 class="modal-title" id="ModalLabel" style="text-align:center;">Editar Veículo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="background-color: #fff">
              <br>
              <form action="editarEstoq.php?id=<?php echo $resultado->IdEstoque; ?>" method="POST" id="editar<?php echo $resultado->IdEstoque; ?>">
                <div class="input-group mb-3">
                  <div class="input-group-prepend ">
                    <span class="input-group-text bg-muted" >Nome:</span>
                  </div>
                  <input type="text" value="<?php echo $nome->NomePeca;?>" readonly class="form-control" style="text-align:center;" name="nome">
                </div>
                <input type="text" name="IdPeca" style="display: none;" value="<?php echo $resultado->NomePeca; ?>">
                <br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Quantidade:</span>
                  </div>
                  <input type="number" value="<?php echo $resultado->Quantidade;?>"  class="form-control" style="text-align:center;" name="quantidade">
                </div>
                <br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Local da Compra:</span>
                  </div>
                  <input type="text" value="<?php echo $resultado->LocalCompra;?>"  class="form-control" style="text-align:center;" name="local">
                </div>
                <br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Nota Fiscal:</span>
                  </div>
                  <input type="number" value="<?php echo $resultado->NotaF;?>"  class="form-control" style="text-align:center;" name="notaF">
                </div>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Valor da Compra:</span>
                  </div>
                  <input type="text" value="<?php echo $resultado->ValorCompra;?>"  class="form-control" style="text-align:center;" name="valor">
                </div>
                <br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Data:</span>
                  </div>
                  <input type="date" value="<?php echo $resultado->DataEstoque;?>"  class="form-control" style="text-align:center;" name="data">
                </div>
                <br>
              </form>
            </div>
            <div class="modal-footer" style="background-color: #e9ecef">
      
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-success" form="editar<?php echo $resultado->IdEstoque; ?>" >Salvar</button>
            
            </div>
          </div>
        </div>

                <?php } ?>

              </tbody>
               </div>
            </table>
            <a href="CadEstoque.php" class="btn btn-outline-primary button1 btn-lg btn-block">Cadastrar</a>
          
  </div>
</div>

     


</body>
</html>





 