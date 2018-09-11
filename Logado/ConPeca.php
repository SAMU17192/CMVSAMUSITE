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
            
            <h2 class="text-danger" align="center">Consulta de Peças</h2>
            <table class="table table-striped">
              <thead>
                <tr class="bg-danger">
                  <th scope="col">Nome peça</th>
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
                  <td><?php echo $resultado->nomepeca; ?></td>
                  <td><?php echo $resultado->kmlimite; ?></td>
                  <td><a class="btn btn-outline-success"  data-toggle="modal" data-target="#editarPeca-<?php echo $resultado->idpeca;?>" ><i class="fas fa-edit"></a></td>
                  <td><a href="deletarPeca.php?id=<?php echo $resultado->idpeca;?>" class="btn btn-outline-danger"><i class="fas fa-times-circle"></a></td>
                </tr>
                <div class="modal fade" id="editarPeca-<?php echo $resultado->idpeca;?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="ModalLabel" style="text-align:center;">Editar Peça</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body bg-danger">
                      <br>
                      <form action="editarPeca.php?id=<?php echo $resultado->idpeca; ?>" method="POST" id="editar<?php echo $resultado->idpeca; ?>">
                        <div class="input-group mb-3">
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Nome:</span>
                          </div>
                          <input type="text" value="<?php echo $resultado->nomepeca;?>"  class="form-control" style="text-align:center;" name="nome" id="nome">
                        </div>
                        <br>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Kilometragem:</span>
                          </div>
                          <input type="text" value="<?php echo $resultado->kmlimite;?>"  class="form-control" style="text-align:center;" name="km" id="km">
                        </div>
                        <br>
                      </form>
                    </div>
                    <div class="modal-footer">
              
                      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                      <button type="submit" class="btn btn-outline-success" form="editar<?php echo $resultado->idpeca; ?>" >Salvar</button>
                    
                    </div>
                  </div>
                </div>
                <?php } ?>
              </tbody>

            </table>
            <a href="CadPeca.php" class="btn btn-outline-primary button1 btn-lg btn-block">Cadastrar</a>
       </div>
    </div>
  </div>
</div>
</body>
</html>





 