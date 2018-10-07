<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
	<title>C.M.V SAMU - 192</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css">
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.js"></script>
	<link rel="stylesheet" href="https://pro-staging.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-TXfwrfuHVznxCssTxWoPZjhcss/hp38gEOH8UPZG/JcXonvBQ6SlsIF49wUzsGno" crossorigin="anonymous">
  <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/animate.css@3.5.2/animate.min.css" integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw" crossorigin="anonymous">
    <!-- or -->
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css"
    integrity="sha384-OHBBOqpYHNsIqQy8hL1U+8OXf9hH6QRxi0+EODezv82DfnZoV7qoHAZDwMwEJvSw"
    crossorigin="anonymous">
</head>
<style type="text/css">

  @keyframes loading {
  from { width: 100% }
  to { width: 100% }
}
#barra{
    border-radius:1rem;

    display: block;
    width: 298px;
    height: 28px;
    line-height: 28px;
    text-align: center;
    color: #000;
    border: 1px wave #000;
    position: relative;
    background-color:white;
}

#progresso{
    display: block;
    font-family: impact;
    color:;
    border-radius:1rem;
    height: 100%;
    background: #8BC34A;
    position: absolute;
    top: 0;
    left: 0;
}
  
</style>
<script type="text/javascript">

$(document).ready(function(){
    $("#toop").empty();

    $.ajax({
      url: 'http://localhost/CMVSAMUSITE/Usuario/ajax/webserivce.php',
      method: "post",
      dataType: "json",
      data: {id: 1, tipo: "pesqamb"},
          success: function(data) {                                   
             if (data != 1){

                var acumul2 = "";

            for (var i = 0; i < data.length; i++)
            {
     

              var kmf = data[i].KmAtual - data[i].KmTroca;
              var conta = 100 - ((kmf/ data[i].KmLimiite)*100);
           
              if (conta <= 5) {

                acumul2 = '<div class="row"><p style="color:white; font-size:20px;"> '+data[i].NomePeca+' - '+data[i].NomeVeiculo+' <br></p> <div id="barra"> <div class="bg-dark animated pulse slower" id="progresso" style="width: 100%; color:white;">Faça a troca</div></div>&nbsp;&nbsp;<img data-toggle="modal" data-target="#troca-'+data[i].IdPeca+'" class=" animated pulse slower" src="icones/trocar.png" height="30px"></div><br>';
              }else{
              
              acumul2 = '<div class="row"><p style="color:white; font-size:20px;"> '+ data[i].NomePeca + ' - '+ data[i].NomeVeiculo + ' <br></p> <div id="barra"> <div class="bg-success" id="progresso" style="width: '+conta+'%">'+conta+'%</div></div><br></div><br>';
            }

               $("#toop").append(acumul2);
            }

             }

          }

    });

});
function veiculos(IdVeiculo){
  $("#toop").empty();
  $.ajax({
      url: 'http://localhost/CMVSAMUSITE/Usuario/ajax/webserivce.php',
      method: "post",
      dataType: "json",
      data: {id: IdVeiculo, tipo: "pesqamb"},
          success: function(data) {                                   
             if (data != 1){

                var acumul2 = "";
                for (var i = 0; i < data.length; i++)
                {
                 var kmf = data[i].KmAtual - data[i].KmTroca;
                  var conta = 100 - ((kmf/ data[i].KmLimiite)*100);

                  if (conta <= 5) {
                    
                    acumul2 = '<div class="row"><p style="color:white; font-size:20px;">'+data[i].NomePeca+' - '+data[i].NomeVeiculo+'<br> </p> <div id="barra"> <div class="bg-dark animated pulse slower" id="progresso" style="width: 100%; color:white;">Faça a troca</div></div>&nbsp;&nbsp;<img data-toggle="modal" data-target="#troca-'+data[i].IdPeca+'" class=" animated pulse slower" src="icones/trocar.png" height="30px"></div><br>';

                  }else{
                  
                  acumul2 = '<div class="row"><p style="color:white; font-size:20px;"> '+ data[i].NomePeca + ' - '+ data[i].NomeVeiculo + ' <br></p> <div id="barra"> <div class="bg-success" id="progresso" style="width: '+conta+'%">'+conta+'%</div></div><br></div><br>';
                  }

                   $("#toop").append(acumul2);

                }

             }

          }

    });
}

</script>

<body class="bg-light">



<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="Logado.php"><i style="font-size: 2rem;" class="fal fa-car-mechanic"></i><b> C.M.V SAMU - 192</b></a>
  
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
    <div class="row">
      <div class="col-md-0">
        
      </div>

      <div class="col-md-12" align="center" >
        <div class="bg-danger" style="border-radius: 15px;">
              
        <div class="row">
          
          <div class="col-md-2"></div>

            <div class="col-md-8" align="center" style="margin-top: 4%; margin-bottom: 4%;">
              
               <?php
              include_once 'Codigo.php';
              $sqlTroca = $conexao->query("SELECT t.*, v.NomeVeiculo FROM trocas as t INNER JOIN veiculos as v on (t.IdVeiculo = v.IdVeiculo) ORDER BY t.IdVeiculo ASC ");
                  while ($resultadoTroca = $sqlTroca->fetch(PDO::FETCH_OBJ)) {
                    ?>
              <button class="btn btn-outline-info" onclick="veiculos(<?php echo $resultadoTroca->IdVeiculo;?>);"><?php echo $resultadoTroca->NomeVeiculo; ?></button>
              <?php
            }
            ?>
              <br>
              <br>
              <br>
              <div id="toop"></div>
            </div>
                      
          </div>


          <div class="col-md-0"></div>

        </div>

        </div>
      </div>

      <div class="col-md-0">
        
      </div>
    </div>
  </div>
</div>

</body>
</html>
                    