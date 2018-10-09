<!DOCTYPE html>
<html>
<head>
	<title>C.M.V SAMU - 192</title>
	<meta charset="utf-8">
  <link rel="icon" href="icones/samu.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="https://pro-staging.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-TXfwrfuHVznxCssTxWoPZjhcss/hp38gEOH8UPZG/JcXonvBQ6SlsIF49wUzsGno" crossorigin="anonymous">
</head>
<body class="bg-light">



<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="Logado.php"><!-- <i style="font-size: 2rem;" class="fal fa-car-mechanic"></i> --><img src="icones/samu.png" height="50px"><b> C.M.V SAMU - 192</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <!-- Veiculos -->
     <li class="nav-item ">
        <a class="nav-link" href="ConAmb.php" >
          Veículos
        </a>
        
      </li>
      <!-- Peças -->
      <li class="nav-item ">
        <a class="nav-link " href="ConPeca.php" >
          Peças
        </a>
      </li>

       <!-- Estoque -->
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Estoque
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light " href="CadEstoque.php">Adicionar</a>
          <a class="dropdown-item text-light" href="ConEstoque.php">Verificar</a>
        </div>
      </li>

      <!-- Controle de manutenção -->
        <a class="nav-link" href="controle.php"  aria-haspopup="true" aria-expanded="false">
          Controle de Manutenção
        </a>
        
       <!-- Sair -->
        <a href="sair.php" class="nav-link" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-out-alt"></i>
         Sair &nbsp;
        </a>
      
    </ul>
  </div>
</nav>

<div class="py-5">
  <div class="container">            

           <h2 class="text-danger" align="center">Consulta de Ambulâncias</h2><BR>
            <table class="table table-striped">
              <thead>
                <tr class="bg-danger text-light">
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
                  <td><?php echo $resultado->PlacaVeiculo; ?></td>
                  <td><?php echo $resultado->NomeVeiculo; ?></td>
                  <td><?php echo $resultado->KmVeiculo; ?></td>

                  <td><a class="btn btn-outline-primary" data-toggle="modal" data-target="#modal-<?php echo $resultado->IdVeiculo;?>" ><i class="fas fa-edit"></i></a></td>
                  <!--<td><a href="excluir.php?id=<?php// echo $resultado->idveiculo;?>" class="btn btn-outline-danger"><i class="fas fa-times-circle"></a></td>-->

                  <!--<td><a href="editar.php?id=<?php// echo $resultado->idveiculo;?>" class="btn btn-outline-success"><i class="fas fa-edit"></a></td>-->
                  <td><a href="deletarAmb.php?id=<?php echo $resultado->IdVeiculo;?>" class="btn btn-outline-danger"><i class="fas fa-times-circle"></a></td>

                </tr>
                 <div class="modal fade" id="modal-<?php echo $resultado->IdVeiculo;?>" tabindex="-1" role="dialog">
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
              <form action="editarVei.php?id=<?php echo $resultado->IdVeiculo; ?>" method="POST" id="editar<?php echo $resultado->IdVeiculo; ?>">
                <div class="input-group mb-3">
                  <div class="input-group-prepend ">
                    <span class="input-group-text bg-muted" >Placa:</span>
                  </div>
                  <input type="text" value="<?php echo $resultado->PlacaVeiculo;?>"  class="form-control" style="text-align:center;" name="placa" id="placa">
                </div>
                <br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Veículo:</span>
                  </div>
                  <input type="text" value="<?php echo $resultado->NomeVeiculo;?>"  class="form-control" style="text-align:center;" name="nome" id="nome">
                </div>
                <br>
                <div class="input-group mb-3">
                  <div class="input-group-prepend">
                    <span class="input-group-text">Kilometragem:</span>
                  </div>
                  <input type="text" value="<?php echo $resultado->KmVeiculo;?>"  class="form-control" style="text-align:center;" name="km" id="km">
                </div>
                <br>
              </form>
            </div>
            <div class="modal-footer" style="background-color: #e9ecef">
      
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
              <button type="submit" class="btn btn-outline-success" form="editar<?php echo $resultado->IdVeiculo; ?>" >Salvar</button>
            
            </div>
          </div>
        </div>
                <?php } ?>

        </tbody>
           </div>
          </table>
         
          </div>
        </div>

</body>
</html>





 