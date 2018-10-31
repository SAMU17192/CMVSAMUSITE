<?php

include_once"Codigo.php";

//estrutura do pdf
$html = '<link rel="stylesheet" type="text/css" href="css/bootstrap.css">';
$html .= '<h1 style="text-align:center;"><b>Controle de manutenção</b></h1> <br>';
$html .= '<table class="table table-bordered " style="font-size: 12px;" >';
$html .= '<thead>';
$html .= '<tr class="bg-dark text-light">';
$html .= '<th>N°</th>';
$html .= '<th>Veiculo</th>';
$html .= '<th>Peça</th>';
$html .= '<th>Km da Troca</th>';
$html .= '<th>Gasto</th>';
$html .= '<th>Estoque</th>';
$html .= '<th>N° Nota</th>';
$html .= '<th>Local da Compra</th>';
$html .= '<th>Data</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

//pega o filtro selecionado
$filtro = $_POST["filtro"];

//exibe todas as vendas conforme o filtro

$sql = "";

if ($filtro == "cres") {
	$sql = "SELECT * FROM historicotroca WHERE year(Data) = year(curdate()) ORDER BY Data ASC";
}
else if ($filtro == "desc") {
	$sql = "SELECT * FROM historicotroca WHERE year(Data) = year(curdate()) ORDER BY Data DESC";
}
else{
	$sql = "SELECT * FROM historicotroca $filtro AND year(Data) = year(curdate()) ORDER BY Data ASC";
}


$sqlRelatorio = $conexao->query($sql);
//fazendo um loop para exibir todas as vendas
while($resultado = $sqlRelatorio->fetch(PDO::FETCH_OBJ)){
	//pegando o nome do produto pelo id
		$html .='<tr>';
		$html .='<td>'.$resultado->IdHis.'</td>';
	 	$html .='<td>'.$resultado->NomeVeiculo.'</td>';
	 	$html .='<td>'.$resultado->NomePeca.'</td>';
		$html .='<td>'.$resultado->KmTroca.'</td>';
		$html .='<td>R$ '.number_format($resultado->Valor,2,",",".").'</td>';
		$html .='<td>'.$resultado->Estoque.'</td>';
		$html .='<td>'.$resultado->NumeroNota.'</td>';
		$html .='<td>'.$resultado->LocalCompra.'</td>';
		$datatroca = new DateTime($resultado->Data);
		$html .='<td>'.$datatroca->format('d/m/Y').'</td>';
		$html .='</tr>';
}

$html .= '</tbody>';
$html .= '</table>';
// usando o pdf
use Dompdf\Dompdf;
require_once "dompdf/autoload.inc.php";
//carregando o pdf
$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->setPaper('A4','landscape');
ob_clean();
$dompdf->render();
$dompdf->stream("relatorio.php",array("Attachment" => false));

?> 