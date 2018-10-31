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
</head>
<body class="bg-light">

<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
<ul class="navbar-nav mr-auto">
<li class="nav-item active">
<a class="navbar-brand" href="#"><i style="font-size: 2rem;" class="fal fa-car-mechanic"></i><b> C.M.V SAMU - 192</b></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  </li>
   </ul>
      <button class="btn btn-outline-light d-none d-lg-inline-block mb-3 mb-md-0 ml-md-3" id="btnvoltar" style="border-style:solid; ">Voltar</button>
</nav>
<script type="text/javascript">
    $("#btnvoltar").click(function(){
      window.location.href = "index.php";
    });
  </script>
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
            
            <form action="LogarCod.php" method="post">
              <div class="form-group">
                <h3 for="senha" class="text-light"><b>Senha</b></h3>
                <input type="password" class="form-control" placeholder="Entre com a senha" name="senha" id="senha">
              </div>

              <div class="form-group">
                <input type="submit" value="Entrar" class="btn btn-outline-light ">
              </div>
            </form>

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