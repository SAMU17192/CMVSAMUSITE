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
      
    </ul>
  </div>
</nav>
  
<div class="py-5">
  <div class="container">
            
            <h2 class="text-danger" align="center">Consulta de Peças</h2><br>
            <table class="table table-striped">
              <thead>
                <tr class="bg-danger text-light">
                  <th scope="col">Nome peça</th>
                  <th scope="col">Descrição</th>
                  <th scope="col">Km máximo</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Excluir</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  include_once 'Codigo.php';
                  $sql = $conexao->query("SELECT * FROM pecas");
                  while ($resultado = $sql->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                  <td><?php echo $resultado->NomePeca; ?></td>
                  <td><?php echo $resultado->DescricaoPeca; ?></td>
                  <td><?php echo $resultado->KmLimitePeca; ?></td>
                  <td><a class="btn btn-outline-success"  data-toggle="modal" data-target="#editarPeca-<?php echo $resultado->IdPeca;?>" ><i class="fas fa-edit"></a></td>
                  <td><a href="deletarPeca.php?id=<?php echo $resultado->IdPeca;?>" class="btn btn-outline-danger"><i class="fas fa-times-circle"></a></td>
                </tr>

                <!-- Editar peça-->
                <div class="modal fade" id="editarPeca-<?php echo $resultado->IdPeca;?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-danger text-light">
                      <h5 class="modal-title" id="ModalLabel" style="text-align:center;">Editar Peça</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body" style="background-color: #fff">
                      <br>
                      <form action="editarPeca.php?id=<?php echo $resultado->IdPeca; ?>" method="POST" id="editar<?php echo $resultado->IdPeca; ?>">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Nome:</span>
                          </div>
                          <input type="text" value="<?php echo $resultado->NomePeca;?>"  class="form-control" style="text-align:center;" name="nome" id="nome">
                        </div>
                        <br>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Descrição:</span>
                          </div>
                          <input type="text" value="<?php echo $resultado->DescricaoPeca;?>"  class="form-control" style="text-align:center;" name="descricao" id="descricao">
                        </div>
                        <br>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Kilometragem:</span>
                          </div>
                          <input type="text" value="<?php echo $resultado->KmLimitePeca;?>"  class="form-control" style="text-align:center;" name="km" id="km">
                        </div>
                        <br>
                      </form>
                    </div>
                    <div class="modal-footer" style="background-color: #e9ecef">
              
                      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-outline-success" form="editar<?php echo $resultado->IdPeca; ?>" >Salvar</button>
                    
                    </div>
                  </div>  
                </div>
                <!-- Fim editar-->

                <?php } ?>

              </tbody>  
            </table>
  </div>
</div>
</body>
</html>





 