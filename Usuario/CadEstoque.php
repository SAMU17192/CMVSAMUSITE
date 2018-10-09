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
          <a class="dropdown-item text-light " href="CadEstoque.html">Adicionar</a>
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
    <div class="row">
      <div class="col-md-2">
        
      </div>
      <div class="col-md-8">
        <div class="bg-danger" style="border-radius: 15px;">
              
        <div class="row">
          
          <div class="col-md-2"></div>

          <div class="col-md-8" style="margin-top: 4%; margin-bottom: 4%;">
              
             <form action="CadEstoqCod.php" method="post">
                <h1 style="color:white;">Cadastro de Estoque</h1>

               <div class="form-group row">
                  <div class="col-8">

                    <?php

                    include_once "Codigo.php";

                    $sql = $conexao->query("SELECT * FROM pecas");
                    
                    ?>

                    <label class="label1"><b>Nome do Produto:</b></label><br>
                    <select class="btn btn-outline-light input-group-text" name="nome">

                      <option>...</option>
                      <?php
                       while ($resultado = $sql->fetch(PDO::FETCH_OBJ)){
                      ?>
                      <option value="<?php echo $resultado->IdPeca; ?>">
                        <?php 
                          echo $resultado->NomePeca;
                         ?>
                           
                      </option>
                      <?php } ?>
                    </select>
                 </div>
                </div>

                <div class="form-group row">
                  <div class="col-8">
                    <label class="label1"><b>Quantidade:</b></label>
                    <input type="number" class="form-control"  placeholder="Entre com a quantidade" name="quantidade">
                 </div>
                </div>

                <div class="form-group row">
                  <div class="col-9">
                    <label class="label1"><b>Local da Compra:</b></label>
                    <input type="text" class="form-control"  placeholder="Entre com o local" name="local">
                 </div>
                </div>

                <div class="form-group row">
                  <div class="col-8">
                    <label class="label1"><b>Nota Fiscal:</b></label>
                    <input type="number" class="form-control"  placeholder="Entre com o n° da nota" name="notaF">
                 </div>
                </div>

                <div class="form-group row">
                  <div class="col-8">
                    <label class="label1"><b>Valor da Compra:</b></label>
                    <input type="text" class="form-control"  placeholder="R$ - " name="valor" >
                 </div>
                </div>

                <div class="form-group row">
                  <div class="col-8">
                    <label class="label1"><b>Data da Compra:</b></label>
                    <input type="date" class="form-control" name="data" max="<?php echo date("Y-m-d",time()); ?>">
                 </div>
                </div>

                <div class="form-group row">
                  <div class="col-12">
                    <button type="submit" class="btn btn-outline-dark text-light button1 btn-lg btn-block">Cadastrar</button>
                 </div>
                </div>
              </form>
              <a href="ConEstoque.php" class="btn btn-outline-primary text-light button1 btn-lg btn-block">Consultar</a>

          </div>

          <div class="col-md-2"></div>

        </div>

        </div>
      </div>
      <div class="col-md-2">
        
      </div>
    </div>
  </div>
</div>




</body>
</html>





 