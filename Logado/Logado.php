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
     $('#progresso').addClass('animated bounceInLeft');

});

</script>

<body style="background-color: #c9c9c9">



<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#"><i style="font-size: 2rem;" class="fal fa-car-mechanic"></i><b> C.M.V SAMU - 192</b></a>
  
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Veículos
        </a>
        <div class="dropdown-menu bg-dark" aria-labelledby="navbarDropdown">
          <a class="dropdown-item text-light " href="CadAmb.html">Adicionar</a>
          <a class="dropdown-item text-light" href="#">Verificar</a>
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

      <div class="col-md-8" align="center" >
        <div class="bg-danger" style="border-radius: 15px;">
              
        <div class="row">
          
          <div class="col-md-2"></div>

          <div class="col-md-8" style="margin-top: 4%; margin-bottom: 4%;">
             <div class="row">
        <p style="color:white; font-size:20px;">Pastilha do Freio - </p> <div id="barra"> <div class="animated shake bg-success" id="progresso" style="width: 50%;">50%</div></div><br>
        </div>
        <div class="row">
        <p style="color:white; font-size:20px;">Correia dentada - </p><div id="barra"><div class="bg-success" id="progresso" style="width: 35%;">35%</div></div><br>
      </div>
        <div class="row">
        <p style="color:white; font-size:20px;">Pneu - </p><div id="barra"><div class="bg-success" id="progresso" style="width: 0%;">0%</div></div><img src="icones/trocar.png" height="25px"><br>
        </div>
        <div class="row">
        <p style="color:white; font-size:20px;">Véla - </p><div id="barra"><div class="bg-success" id="progresso" style="width: 85%;">85%</div></div><br>
      </div>
      </div>

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