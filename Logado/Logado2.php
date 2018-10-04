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

</script>

<body style="background-color: #c9c9c9">



<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
  <a class="navbar-brand" href="#"><i style="font-size: 2rem;" class="fal fa-car-mechanic"></i><b> C.M.V SAMU - 192</b></a>
  
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

            include_once('Codigo.php');
          
           $sqlTroca = $conexao->query("SELECT * FROM troca");
           while ($resultadoTroca = $sqlTroca->fetch(PDO::FETCH_OBJ)) {
           $sqlVei = $conexao->query("SELECT * FROM veiculos ");
           while ($resultadoVei = $sqlVei->fetch(PDO::FETCH_OBJ)) {
           $sqlPeca = $conexao->query("SELECT * FROM pecas");
           while ($resultadoPeca = $sqlPeca->fetch(PDO::FETCH_OBJ)) {


            if ($resultadoVei->idveiculo == $resultadoTroca->idveiculo && $resultadoPeca->idpeca == $resultadoTroca->idpeca) {
                

            $kmfinal = $resultadoTroca->kmatual - $resultadoTroca->kmtroca;

           

            $conta =  100 - (($kmfinal / $resultadoPeca->kmlimite)*100);

            $conta1 = number_format($conta, 2, '.','');
            $conta2 = number_format($conta, 2, ',','');

            if($conta1 <= 5 ){

               echo '<div class="row">Trocado
                <p style="color:white; font-size:20px;"> '.$resultadoPeca->nomepeca.' - '.$resultadoVei->nomeveiculo.' <br></p> <div id="barra"> <div class="bg-dark animated pulse slower" id="progresso" style="width: 100%; color:white;">Faça a troca</div></div>&nbsp;&nbsp;<img data-toggle="modal" data-target="#troca-'.$resultadoPeca->idpeca.'" class=" animated pulse slower" src="icones/trocar.png" height="30px">
              </div><br>';
            ?>
               <form action="Troca.php?idamb=<?php echo $resultadoVei->idveiculo;?>&idpeca=<?php echo $resultadoPeca->idpeca;?>&kmtroca=<?php echo $resultadoVei->kmup;?>" method="post">

              <div class="modal fade" id="troca-<?php echo $resultadoPeca->idpeca;?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-danger">
                      <h5 class="modal-title" id="ModalLabel" style="text-align:center;">Trocar Peça</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                   
                    <div class="modal-body bg-light">
                     <div class="input-group mb-3">
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Nome:</span>
                          </div>
                          <input type="text" value="<?php echo $resultadoPeca->nomepeca;?>"  class="form-control" style="text-align:center;" name="nome" readonly id="nome">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Kilometragem:</span>
                          </div>
                          <input type="text" value="<?php echo $resultadoPeca->kmlimite;?>"  class="form-control" style="text-align:center;" readonly name="km" id="km">
                        </div>
                    <?php
                    $sqlEstoque = $conexao->query("SELECT * FROM estoque WHERE idpeca =$resultadoPeca->idpeca AND quantidade > 0");
                    $resultadoEstoque = $sqlEstoque->fetch(PDO::FETCH_OBJ);
                    if ($resultadoEstoque == true) {
                      ?>

                      
                      <div class="input-group mb-3">

                      <span class="input-group-text bg-muted">Deseja retirar do estoque?</span>
                       
                      </div> 

                          <div class="d-block my-3 ">

                          <div class="input-group mb-3 ">

                          <div class="custom-control custom-radio ">

                            <input class="form-control-input " type="radio" name="estoque"  onclick="$('#valorpeca').hide();" id="sim" value="1" checked >
                            <label class="form-control-label" for="sim">Sim</label>

                          </div>

                          <div class="custom-control custom-radio">

                          
                            <input class="form-control-input" type="radio" onclick="$('#valorpeca').show();" name="estoque" id="nao" value="0" >
                            <label class="form-control-label" for="nao">Não</label>

                          </div>

                          </div>
                         
                          </div>
                           <div class="input-group mb-3" id="valorpeca">
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Valor da peça:</span>
                          </div>
                          <input type="text" class="form-control" style="text-align:center;" name="valorpeca" id="nome">
                        </div>
                         

                          <?php                 
             
                        }else{
                          ?>
                          <div class="input-group mb-3" >
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Valor da peça:</span>
                          </div>
                          <input type="text" class="form-control" style="text-align:center;" name="valorpeca" id="nome">
                        </div>
                          <?php
                        }
                        ?>
                        
                    </div>
                    <div class="modal-footer" style="background-color: #e9ecef">
              
                      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                      <input type="submit"  class="btn btn-outline-success " for="editar<?php echo $resultadoPeca->idpeca; ?>" value="Trocar"  >
                    
                    </div>
                    
                  </div>
                </div>
                </div>
                </form>

              <?php

            }else{

                echo '<div class="row">Trocado
                <p style="color:white; font-size:20px;"> '.$resultadoPeca->nomepeca.' - '.$resultadoVei->nomeveiculo.' <br></p> <div id="barra"> <div class="bg-success" id="progresso" style="width: '.$conta1.'%">'.$conta2.'%</div></div><br>
              </div><br>';
            }
            }else{

            $kmfinal = $resultadoVei->kmup - $resultadoVei->kmveiculo;

           

            $conta =  100 - (($kmfinal / $resultadoPeca->kmlimite)*100);

            $conta1 = number_format($conta, 2, '.','');
            $conta2 = number_format($conta, 2, ',','');

             if($conta1 <= 5 ){

               echo '<div class="row">
                <p style="color:white; font-size:20px;"> '.$resultadoPeca->nomepeca.' - '.$resultadoVei->nomeveiculo.' <br></p> <div id="barra"> <div class="bg-dark animated pulse slower" id="progresso" style="width: 100%; color:white;">Faça a troca</div></div>&nbsp;&nbsp;<img data-toggle="modal" data-target="#troca-'.$resultadoPeca->idpeca.'" class=" animated pulse slower" src="icones/trocar.png" height="30px">
              </div><br>';
              ?>
               <form action="Troca.php?idamb=<?php echo $resultadoVei->idveiculo;?>&&idpeca=<?php echo $resultadoPeca->idpeca;?>&&kmtroca=<?php echo $resultadoVei->kmup;?>" method="post">

              <div class="modal fade" id="troca-<?php echo $resultadoPeca->idpeca;?>" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header bg-danger">
                      <h5 class="modal-title" id="ModalLabel" style="text-align:center;">Trocar Peça</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                   
                    <div class="modal-body bg-light">
                     <div class="input-group mb-3">
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Nome:</span>
                          </div>
                          <input type="text" value="<?php echo $resultadoPeca->nomepeca;?>"  class="form-control" style="text-align:center;" name="nome" readonly id="nome">
                        </div>
                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <span class="input-group-text">Kilometragem:</span>
                          </div>
                          <input type="text" value="<?php echo $resultadoPeca->kmlimite;?>"  class="form-control" style="text-align:center;" readonly name="km" id="km">
                        </div>
                    <?php
                    $sqlEstoque = $conexao->query("SELECT * FROM estoque WHERE idpeca =$resultadoPeca->idpeca AND quantidade > 0");
                    $resultadoEstoque = $sqlEstoque->fetch(PDO::FETCH_OBJ);
                    if ($resultadoEstoque == true) {
                      ?>

                      
                      <div class="input-group mb-3">

                      <span class="input-group-text bg-muted">Deseja retirar do estoque?</span>
                       
                      </div> 

                          <div class="d-block my-3 ">

                          <div class="input-group mb-3 ">

                          <div class="custom-control custom-radio ">

                            <input class="form-control-input " type="radio" name="estoque"  onclick="$('#valorpeca').hide();" id="sim" value="1" checked >
                            <label class="form-control-label" for="sim">Sim</label>

                          </div>

                          <div class="custom-control custom-radio">

                          
                            <input class="form-control-input" type="radio" onclick="$('#valorpeca').show();" name="estoque" id="nao" value="0" >
                            <label class="form-control-label" for="nao">Não</label>

                          </div>

                          </div>
                         
                          </div>
                           <div class="input-group mb-3" id="valorpeca">
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Valor da peça:</span>
                          </div>
                          <input type="text" class="form-control" style="text-align:center;" name="valorpeca" id="nome">
                        </div>
                         

                          <?php                 
             
                        }else{
                          ?>
                          <div class="input-group mb-3" >
                          <div class="input-group-prepend ">
                            <span class="input-group-text bg-muted" >Valor da peça:</span>
                          </div>
                          <input type="text" class="form-control" style="text-align:center;" name="valorpeca" id="nome">
                        </div>
                          <?php
                        }
                        ?>
                        
                    </div>
                    <div class="modal-footer" style="background-color: #e9ecef">
              
                      <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                      <input type="submit"  class="btn btn-outline-success " for="editar<?php echo $resultadoPeca->idpeca; ?>" value="Trocar"  >
                    
                    </div>
                    
                  </div>
                </div>
                </div>
                </form>

              <?php

            }else{

                echo '<div class="row">
                <p style="color:white; font-size:20px;"> '.$resultadoPeca->nomepeca.' - '.$resultadoVei->nomeveiculo.' <br></p> <div id="barra"> <div class="bg-success" id="progresso" style="width: '.$conta1.'%">'.$conta2.'%</div></div><br>
              </div><br>';
            }
            }

           }
         }
       }

           ?>
              
              
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