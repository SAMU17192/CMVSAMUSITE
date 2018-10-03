<?php

include_once"Codigo.php";

//estrutura do pdf
$html = '<link rel="stylesheet" type="text/css" href="css/bootstrap.css">';
$html .= '<h1 style="text-align:center;">Relatório de vendas</h1>';
$html .= '<table class="table table-bordered table-striped">';
$html .= '<thead>';
$html .= '<tr>';
$html .= '<th>N°</th>';
$html .= '<th>Veiculo</th>';
$html .= '<th>Peça</th>';
$html .= '<th>Km da Troca</th>';
$html .= '<th>Gasto</th>';
$html .= '<th>Estoque</th>';
$html .= '</tr>';
$html .= '</thead>';
$html .= '<tbody>';

//pega o filtro selecionado
$filtro = $_POST["filtro"];

//exibe todas as vendas conforme o filtro 
$sqlRelatorio = $conexao->query("SELECT * FROM troca $filtro ");
//fazendo um loop para exibir todas as vendas
while($resultado = $sqlRelatorio->fetch(PDO::FETCH_OBJ)){
	//pegando o nome do produto pelo id
		$html .='<td>'.$resultado->id.'</td>'

		$veiculo = $conexao->query("SELECT * FROM veiculos WHERE idveiculo = $resultado->idveiculo");
		$nomeveiculo = $veiculo->fetch(PDO::FETCH_OBJ);
	 	$html .='<tr><td>'.$nomeveiculo->nomeveiculo.'</td>';

	 	$peca = $conexao->query("SELECT * FROM pecas WHERE idpeca = $resultado->idpeca");
		$nomepeca = $peca->fetch(PDO::FETCH_OBJ);
	 	$html .='<tr><td>'.$nomepeca->nomepeca.'</td>';

		$html .='<td>'.$resultado->kmtroca.'</td>';
		$html .='<td>R$ '.number_format($resultado->valor,2,",",".").'</td>';
		$html .='<td>'.$resultado->estoque.'</td>';
		
		//$datatroca = new DateTime($resultado->datatroca);
		//$html .='<td>'.$datatroca->format('d/m/Y').'</td>';
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