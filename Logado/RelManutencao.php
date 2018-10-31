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
$html .= '<th>Data</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

//pega o filtro selecionado
$filtro = $_POST["filtro"];

//exibe todas as vendas conforme o filtro 
$sqlRelatorio = $conexao->query("SELECT * FROM historicotroca $filtro");
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
$dompdf->setPaper('A4','portrait');
ob_clean();
$dompdf->render();
$dompdf->stream("relatorio.php",array("Attachment" => false));

?> 