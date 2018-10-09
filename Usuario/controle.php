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
  <script src="js/requisicao.js"></script>
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

       <!-- Sair -->
        <a href="sair.php" class="nav-link" aria-haspopup="true" aria-expanded="false"><i class="fas fa-sign-out-alt"></i>
         Sair &nbsp;
        </a>

    </ul>
  </div>
</nav>

<div class="py-5">
  <div class="container">
            
           <label class="text-danger" for="pesquisa"><i class="fas fa-search"></i> Pesquisar :</label>
             <input class="form-control" type="text" id="filtroC" ><br>

           <h2 class="text-danger" align="center">Controle de Manutenção</h2><br>
            <table class="table table-striped ">
              <thead>
                <tr class="bg-danger text-light">
                  <th scope="col">N°</th>
                  <th scope="col">Veiculo</th>
                  <th scope="col">Peça</th>
                  <th scope="col">Km da troca</th>
                  <th scope="col">Gasto (R$)</th>
                  <th scope="col">Estoque</th>
                  <th scope="col">N° Nota</th>
                  <th scope="col">Local da compra</th>
                  <th scope="col">Data</th>
                </tr>
              </thead>

              <tbody id="tabela" >
                <?php 
                  include_once 'Codigo.php';
                  $sql = $conexao->query("SELECT * FROM historicotroca ");
                  while ($resultado = $sql->fetch(PDO::FETCH_OBJ)) {
                ?>
                <tr>
                  <td><?php echo $resultado->IdHis; ?></td> 
                  <td><?php echo $resultado->NomeVeiculo; ?></td> 
                  <td><?php echo $resultado->NomePeca; ?></td>
                  <td><?php echo $resultado->KmTroca; ?></td>
                  <td><?php echo $resultado->Valor; ?></td>
                  <td><?php echo $resultado->Estoque; ?></td>
                  <td><?php echo $resultado->NumeroNota; ?></td>
                  <td><?php echo $resultado->LocalCompra; ?></td>
                  <td><?php echo date('d/m/Y',strtotime($resultado->Data)); ?></td>
                  
                </tr>

                <?php } ?>

              </tbody>
               </div>
            </table>
            
            <!-- encaminha a opção selecionada para relatoriovendas.php-->
    <form action="RelManutencao.php"  method="POST">
      <legend class="text-danger"><b>Relatório</b></legend>
      <select class="input-group-text" name="filtro" id="filtro">
        <option value="">Selecione uma opção</option>
        <!-- opções de relatorios-->
        <option value="ORDER BY Data ASC">Data - Crescente </option><!--mostra a data das vendas em ordem crescente-->
        <option value="ORDER BY Data DESC">Data - Decrescente </option><!--mostra a data das vendas em ordem decrescente-->
        <!-- mostra as vendas de cada mes -->
        <option value="WHERE MONTH(Data) = 01 ORDER BY Data ASC">Janeiro </option>
        <option value="WHERE MONTH(Data) = 02 ORDER BY Data ASC">Fevereiro </option>
        <option value="WHERE MONTH(Data) = 03 ORDER BY Data ASC">Março </option>
        <option value="WHERE MONTH(Data) = 04 ORDER BY Data ASC">Abril </option>
        <option value="WHERE MONTH(Data) = 05 ORDER BY Data ASC">Maio </option>
        <option value="WHERE MONTH(Data) = 06 ORDER BY Data ASC">Junho </option>
        <option value="WHERE MONTH(Data) = 07 ORDER BY Data ASC">Julho </option>
        <option value="WHERE MONTH(Data) = 08 ORDER BY Data ASC">Agosto </option>
        <option value="WHERE MONTH(Data) = 09 ORDER BY Data ASC">Setembro </option>
        <option value="WHERE MONTH(Data) = 10 ORDER BY Data ASC">Outubro </option>
        <option value="WHERE MONTH(Data) = 11 ORDER BY Data ASC">Novembro </option>
        <option value="WHERE MONTH(Data) = 12 ORDER BY Data ASC">Dezembro </option>
      </select><br>
      <button type="submit" class="btn btn-outline-dark ">Gerar Relatório</button>
    </form>
</div>
</div>

</body>
</html>





 