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
  $('#valorpeca').hide();

});
function veiculos(IdVeiculo){
  alert(IdVeiculo);
  $.ajax({
          url: 'http://localhost/CMVSAMUSITE/Logado/ajax/webserivce.php',
      method: "post",
      dataType: "json",
      data: {filtro: texto, tipo: "pesqueamb"},
          success: function(data) {                                   
             if (data != 1){
              alert("Boa");
                var acumul = "";
            for (var i = 0; i < data.length; i++)
            {
              //adicionando os dados do funcionario na tabela
              acumul += '<tr>';
              acumul += '<td>'+ data[i].IdHis + '</td>';
              acumul += '<td>'+ data[i].NomeVeiculo + '</td>';
              acumul += '<td>'+ data[i].NomePeca + '</td>';
              acumul += '<td>'+ data[i].KmTroca + '</td>';
              acumul += '<td>'+ data[i].Valor + '</td>';
              acumul += '<td>'+ data[i].Estoque + '</td>';
              acumul += '<td>'+ data[i].NumeroNota + '</td>';
              acumul += '<td>'+ data[i].LocalCompra + '</td>';
              acumul += '<td>'+ data[i].Data + '</td>';
              acumul += '</tr>';

            }

            $("#progress").append(acumul);

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
              $sqlTroca = $conexao->query("SELECT * FROM trocas ORDER BY IdVeiculo ASC ");
                  while ($resultadoTroca = $sqlTroca->fetch(PDO::FETCH_OBJ)) {
                    ?>
              <button class="btn btn-outline-info" onclick="veiculos(<?php echo $resultadoTroca->IdVeiculo;?>);"><?php echo $resultadoTroca->IdVeiculo; ?></button>
              <?php
            }
            ?>
              <div id="progress"></div>
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