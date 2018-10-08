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
  $("#toop").show('slow');
  $("#trocar").hide();
    $("#toop").empty();
      $("#trocar").empty();


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

                acumul2 = '<div class="row"><p style="color:white; font-size:20px;"> '+data[i].NomePeca+' - '+data[i].NomeVeiculo+' <br></p> <div id="barra"> <div class="bg-dark animated pulse slower" id="progresso" style="width: 100%; color:white;">Faça a troca</div></div>&nbsp;&nbsp;<img onclick="trocarpeca('+data[i].IdPeca+','+data[i].IdVeiculo+','+data[i].KmAtual+');"  class=" animated pulse slower" src="icones/trocar.png" height="30px"></div><br>';
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
  $("#toop").show('slow');
  $("#trocar").hide();
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
                    
                    acumul2 = '<div class="row"><p style="color:white; font-size:20px;">'+data[i].NomePeca+' - '+data[i].NomeVeiculo+'<br> </p> <div id="barra"> <div class="bg-dark animated pulse slower" id="progresso" style="width: 100%; color:white;">Faça a troca</div></div>&nbsp;&nbsp;<img onclick="trocarpeca('+data[i].IdPeca+','+data[i].IdVeiculo+','+data[i].KmAtual+')" class=" animated pulse slower" src="icones/trocar.png" height="30px"></div><br>';

                  }else{
                  
                  acumul2 = '<div class="row"><p style="color:white; font-size:20px;"> '+ data[i].NomePeca + ' - '+ data[i].NomeVeiculo + ' <br></p> <div id="barra"> <div class="bg-success" id="progresso" style="width: '+conta+'%">'+conta+'%</div></div><br></div><br>';
                  }

                   $("#toop").append(acumul2);

                }

             }

          }

    });
}
function trocarpeca(IdPeca, IdVeiculo, KmTroca){

  $("#trocar").empty();

  $("#trocar").show('slow');
  $("#toop").hide('slow');

    $.ajax({
      url: 'http://localhost/CMVSAMUSITE/Usuario/ajax/webserivce.php',
      method: "post",
      dataType: "json",
      data: {IdVeiculo: IdVeiculo, IdPeca: IdPeca,tipo: "pesqtroca"},
          success: function(data) {                                   
             if (data != 1){

                var acumul2 = "";
                for (var i = 0; i < data.length; i++)
                {
                

                    acumul2 += '<h1 style="color:white;">Trocar</h1><br>';

                    acumul2 += '<form action="Troca.php?idvei='+IdVeiculo+'&idpeca='+IdPeca+'&kmtroca='+KmTroca+'" method="post">';
                    
                    acumul2 += '<div class="input-group mb-3"><div class="input-group-prepend "><span class="input-group-text bg-muted" >Nome:</span></div><input type="text" value="'+data[i].NomePeca+'"  class="form-control" style="text-align:center;" name="nome" readonly id="nome"></div>';

                    acumul2 += '<div class="input-group mb-3"><div class="input-group-prepend"><span class="input-group-text">Kilometragem:</span></div><input type="text" value="'+data[i].KmLimiite+'"  class="form-control" style="text-align:center;" readonly name="km" id="km"></div>';

                     $.ajax({
                        url: 'http://localhost/CMVSAMUSITE/Usuario/ajax/webserivce.php',
                        method: "post",
                        dataType: "json",
                        data: {IdPeca: IdPeca, tipo: "pesqtrocaes"},
                        success: function(dados) { 
                                if(dados == 1){

                                    acumul2 += '<div class="input-group mb-3"><span class="input-group-text bg-muted">Deseja retirar do estoque?</span></div>'; 

                                    acumul2 +='<div class="d-block my-3 "><div class="input-group mb-3 "><div class="custom-control custom-radio "><input class="form-control-input " type="radio" name="estoque"  onclick="" id="sim" value="1" checked ><label class="form-control-label" for="sim">Sim</label></div><div class="custom-control custom-radio"><input class="form-control-input" type="radio" onclick="" name="estoque" id="nao" value="0" ><label class="form-control-label" for="nao">Não</label></div></div></div>';

                                    acumul2 += '<div class="input-group mb-3" id="valorpeca"><div class="input-group-prepend "><span class="input-group-text bg-muted" >Valor da Peça:</span></div><input type="text" class="form-control" style="text-align:center;" placeholder="R$ - " name="valorpeca" id="valorpeca"></div>';

                                    acumul2 += ' <div class="input-group mb-3" id="notaF"><div class="input-group-prepend "><span class="input-group-text bg-muted" >Nota Fiscal:</span></div><input type="text" class="form-control" style="text-align:center;" placeholder="N° da nota" name="notaF" id="notaF"></div>';

                                    acumul2 += '<div class="input-group mb-3" id="local"><div class="input-group-prepend "><span class="input-group-text bg-muted" >Local da Compra:</span></div><input type="text" class="form-control" style="text-align:center;" name="local" id="local"></div>';

                                    acumul2 += '<button type="button" class="btn btn-outline-dark">Cancelar</button>&nbsp&nbsp';

                                    acumul2 += '<button type="submit" class="btn btn-outline-success">Trocar</button>';

                                    $("#trocar").append(acumul2);
                                    }if(dados == 0){

                                      acumul2 += '<div class="input-group mb-3" id="valorpeca"><div class="input-group-prepend "><span class="input-group-text bg-muted" >Valor da Peça:</span></div><input type="text" class="form-control" style="text-align:center;" placeholder="R$ - " name="valorpeca" id="valorpeca"></div>';

                                    acumul2 += ' <div class="input-group mb-3" id="notaF"><div class="input-group-prepend "><span class="input-group-text bg-muted" >Nota Fiscal:</span></div><input type="text" class="form-control" style="text-align:center;" placeholder="N° da nota" name="notaF" id="notaF"></div>';

                                    acumul2 += '<div class="input-group mb-3" id="local"><div class="input-group-prepend "><span class="input-group-text bg-muted" >Local da Compra:</span></div><input type="text" class="form-control" style="text-align:center;" name="local" id="local"></div>';

                                    acumul2 += '<button type="button" class="btn btn-outline-dark">Cancelar</button>&nbsp&nbsp';

                                    acumul2 += '<button type="submit" class="btn btn-outline-success">Trocar</button>';
                                                                        $("#trocar").append(acumul2);


                                    }

                                }
                            });



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
              <div id="trocar" style="display: none;" class=""></div>
              
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