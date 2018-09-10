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
<body style="background-color: #c9c9c9">



<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#"><i style="font-size: 2rem;" class="fal fa-car-mechanic"></i><b> C.M.V SAMU - 192</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Veículos
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light " href="CadAmb.html">Adicionar</a>
          <a class="dropdown-item text-light" href="ConAmb.php">Verificar</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Peças
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light " href="CadPeca.html">Adicionar</a>
          <a class="dropdown-item text-light" href="ConPeca.php">Verificar</a>
        </div>
      </li>
    </ul>
  </div>
</nav>

<div class="py-5">
  <div class="container">
    <div class="row">
      <div class="col-md-2">
        
      </div>
      <div class="col-md-8">
        <div class="bg-light" style="border-radius: 15px;">
              
        <div class="row">
          
          <div class="col-md-2"></div>

          <div class="col-md-8" style="margin-top: 4%; margin-bottom: 4%;">
            
<<<<<<< HEAD
            <h2 class="text-danger" align="center"> Consulta de Ambulância </h2>
            
            <table class="table table-striped ">
              <thead >
                <tr class="bg-danger">
=======
            <h1 style="color:white;" align="center"> Consulta de Ambulância </h1>
          <div class="jumbotron">
            <table class="table table-responsive ">
              <thead>
                <tr>
>>>>>>> 1f1ef0f32fec37b8d0f5a7a2d53ed19f00faf2e4
                  <th scope="col">Placa</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Km atual</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Excluir</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  include_once 'Codigo.php';
                  $sql = $conexao->query("SELECT * FROM veiculos");
                  while ($resultado = $sql->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                  <td><?php echo $resultado->placa; ?></td>
                  <td><?php echo $resultado->nomeveiculo; ?></td>
                  <td><?php echo $resultado->kmveiculo; ?></td>
<<<<<<< HEAD
                  <td><a class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-<?php echo $resultado->idveiculo;?>" ><i class="fas fa-edit"></i></a></td>
                  <td><a href="excluir.php?id=<?php echo $resultado->idveiculo;?>" class="btn btn-outline-danger"><i class="fas fa-times-circle"></a></td>
=======
                  <td><a href="editar.php?id=<?php echo $resultado->idveiculo;?>" class="btn btn-outline-success"><i class="fas fa-edit"></a></td>
                  <td><a href="deletarAmb.php?id=<?php echo $resultado->idveiculo;?>" class="btn btn-outline-danger"><i class="fas fa-times-circle"></a></td>
>>>>>>> 5e9dfb168fa52097d1a895a3e68b6eaedc2b5f39
                </tr>
                 <div class="modal fade" id="modal-<?php echo $resultado->idveiculo;?>" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="ModalLabel" style="text-align:center;">Editar Veículo</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body bg-danger">
              <br>
              <form action="editarVei.php?id=<?php echo $resultado->idveiculo; ?>" method="POST" id="editar<?php echo $resultado->idveiculo; ?>">
                <div class="input-group mb-3">
                  <div class="input-group-prepend ">
                    <span class="input-group-text bg-muted" >Placa:</span>
                  </div>
                  <input type="text" value="<?php echo $resultado->placa;?>"  class="form-control" style="text-align:center;" name="placa" id="placa">
                </div>
                <br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Veículo:</span>
                  </div>
                  <input type="text" value="<?php echo $resultado->nomeveiculo;?>"  class="form-control" style="text-align:center;" name="nome" id="nome">
                </div>
                <br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Kilometragem:</span>
                  </div>
                  <input type="text" value="<?php echo $resultado->kmveiculo;?>"  class="form-control" style="text-align:center;" name="km" id="km">
                </div>
                <br>
              </form>
            </div>
            <div class="modal-footer">
      
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-success" form="editar<?php echo $resultado->idveiculo; ?>">Salvar</button>
            
            </div>
          </div>
        </div>
                <?php } ?>
              </tbody>

            </table>
          
        </div>
          <div class="col-md-2"></div>
    </div>
  </div>
</div>

     


</body>
</html>





 