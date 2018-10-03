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
      <div class="col-md-2">
        
      </div>
      <div class="col-md-8">
        <div class="bg-light" style="border-radius: 15px;">
              
        <div class="row">
          
          <div class="col-md-2"></div>

          <div class="col-md-8" style="margin-top: 6%; margin-bottom: 6%;">
            
           <label class="text-danger" for="pesquisa"><i class="fas fa-search"></i> Pesquisar :</label>
             <input class="form-control" type="text" id="filtroC" ><br>

           <h2 class="text-danger" align="center">Contrle de Manutenção</h2>
            <table class="table table-striped ">
              <thead>
                <tr class="bg-danger text-light">
                  <th scope="col">N°</th>
                  <th scope="col">Veiculo</th>
                  <th scope="col">Peça</th>
                  <th scope="col">Km da troca</th>
                  <th scope="col">Gasto (R$)</th>
                  <th scope="col">Estoque</th>
                </tr>
              </thead>

              <tbody>
                <?php 
                  include_once 'Codigo.php';
                  $sql = $conexao->query("SELECT * FROM troca");
                  while ($resultado = $sql->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                  <td><?php echo $resultado->id; ?></td>

                  <?php  
                    // consulta para pegar o nome do veiculo
                    $veiculo = $conexao->query("SELECT * FROM veiculos WHERE idveiculo = $resultado->idveiculo");
                    $nomeveiculo = $veiculo->fetch(PDO::FETCH_OBJ)
                      ?>
                  <!-- mostrando nome do veiculo -->   
                  <td><?php echo $nomeveiculo->nomeveiculo; ?></td>

                  <?php  
                    // consulta para pegar o nome do veiculo
                    $peca = $conexao->query("SELECT * FROM pecas WHERE idpeca = $resultado->idpeca");
                    $nomepeca = $peca->fetch(PDO::FETCH_OBJ)
                      ?>
                  <!-- mostrando nome do veiculo -->   
                  <td><?php echo $nomepeca->nomepeca; ?></td>

                  <td><?php echo $resultado->kmtroca; ?></td>
                  <td><?php echo $resultado->valor; ?></td>
                  <td><?php echo $resultado->estoque; ?></td>
                  
                </tr>

                <?php } ?>

              </tbody>
               </div>
            </table>
            
            <!-- encaminha a opção selecionada para relatoriovendas.php-->
    <form action="RelManutencao.php"  method="POST">
      <legend class="text-danger">Relatório</legend>
      <select class="input-group-text" name="filtro" id="filtro">
        <option value="">Selecione uma opção</option>
        <!-- opções de relatorios-->
        <option value="ORDER BY datatroca ASC">Data - Crescente </option><!--mostra a data das vendas em ordem crescente-->
        <option value="ORDER BY datatroca DESC">Data - Decrescente </option><!--mostra a data das vendas em ordem decrescente-->
        <!-- mostra as vendas de cada mes -->
        <option value="WHERE MONTH(datatroca) = 01 ORDER BY datatroca ASC">Janeiro </option>
        <option value="WHERE MONTH(datatroca) = 02 ORDER BY datatroca ASC">Fevereiro </option>
        <option value="WHERE MONTH(datatroca) = 03 ORDER BY datatroca ASC">Março </option>
        <option value="WHERE MONTH(datatroca) = 04 ORDER BY datatroca ASC">Abril </option>
        <option value="WHERE MONTH(datatroca) = 05 ORDER BY datatroca ASC">Maio </option>
        <option value="WHERE MONTH(datatroca) = 06 ORDER BY datatroca ASC">Junho </option>
        <option value="WHERE MONTH(datatroca) = 07 ORDER BY datatroca ASC">Julho </option>
        <option value="WHERE MONTH(datatroca) = 08 ORDER BY datatroca ASC">Agosto </option>
        <option value="WHERE MONTH(datatroca) = 09 ORDER BY datatroca ASC">Setembro </option>
        <option value="WHERE MONTH(datatroca) = 10 ORDER BY datatroca ASC">Outubro </option>
        <option value="WHERE MONTH(datatroca) = 11 ORDER BY datatroca ASC">Novembro </option>
        <option value="WHERE MONTH(datatroca) = 12 ORDER BY datatroca ASC">Dezembro </option>
      </select><br>
      <button type="submit" class="btn btn-outline-dark ">Gerar Relatório</button>
    </form>

          <div class="col-md-2"></div>
    </div>
  </div>
</div>

     


</body>
</html>





 