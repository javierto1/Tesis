<?php
$rol = $_GET['rol'];
//$rol = 2;
if(strlen($_GET['desde'])>0 and strlen($_GET['hasta'])>0){
	$desde = $_GET['desde'];
	$hasta = $_GET['hasta'];

	$verDesde = date('d/m/Y', strtotime($desde));
	$verHasta = date('d/m/Y', strtotime($hasta));
}else{
	$desde = '1111-01-01';
	$hasta = '9999-12-30';

	$verDesde = '__/__/____';
	$verHasta = '__/__/____';
}
require('../../fpdf/fpdf.php');
require('../../../includes_admin/dbcon.php');
require('../../../includes_admin/fecha_acomodada.php');

class PDF extends FPDF
{

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
	$this->Cell(0,10,utf8_decode('Gráfica "No Convencional"     Página: ').$this->PageNo().'/{nb}','T',0,'C');
    
        
}
}



$pdf = new PDF('L');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 10);

$pdf->Image('../../cp.png' , 10 ,8, 25 , 25,'PNG');
$pdf->Cell(28, 10, '', 0);
$pdf->Cell(220, 10,utf8_decode('Gráfica No Convencional'), 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(50, 10, 'Fecha: '.fechaNormal(date('d-m-Y')).'', 0);
$pdf->Ln(5);

$pdf->Cell(28, 10, '', 0);
$pdf->Cell(220, 10,utf8_decode('Calle Crisol 18, Nueva Córdoba, Córdoba'), 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(50, 10, 'Hora: '.date('H:i:s').'', 0);
$pdf->Ln(4);
$pdf->Cell(28, 10, '', 0);
$pdf->Cell(220, 10,utf8_decode('Teléfono: 0351 460-2860'), 0);
$pdf->Ln(4);
$pdf->Cell(28, 10, '', 0);
$pdf->Cell(120, 10,utf8_decode('Email: graficanoconvencional@gmail.com'), 0);
$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(100, 8, '', 0);

if ($rol==1){$pdf->Cell(100, 8, 'LISTADO DE OPERADORES', 0);};
if ($rol==2){$pdf->Cell(100, 8, 'LISTADO DE CLIENTES', 0);};



$pdf->Ln(10);
$pdf->Cell(90, 8, '', 0);
$pdf->Cell(100, 8, 'Desde: '.$verDesde.' hasta: '.$verHasta, 0);
$pdf->Ln(23);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(15, 8, '# ', 0);
$pdf->Cell(40, 8, 'Nombre', 0);
$pdf->Cell(60, 8, 'Apellido', 0);
$pdf->Cell(70, 8, 'Username', 0);
$pdf->Cell(25, 8, 'Documento', 0);
$pdf->Cell(25, 8, 'Fecha de Alta', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$usuarios = mysql_query("SELECT * FROM datos_personales WHERE fecha_alta BETWEEN '$desde' AND '$hasta' AND rol='$rol' ORDER BY fecha_alta ASC");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($usuarios2 = mysql_fetch_array($usuarios)){
	$item = $item+1;
	//$totaluni = $totaluni + $productos2['precio_unit'];
	//$totaldis = $totaldis + $productos2['precio_dist'];
	$pdf->Cell(15, 8, $item, 0);
	$pdf->Cell(40, 8, utf8_decode($usuarios2['nombre']), 0);
	$pdf->Cell(60, 8, utf8_decode($usuarios2['apellido']), 0);
	$pdf->Cell(70, 8, $usuarios2['username'], 0);
	$pdf->Cell(25, 8, $usuarios2['documento'], 0);
	$pdf->Cell(25, 8, date('d/m/Y', strtotime($usuarios2['fecha_alta'])), 0);
	$pdf->Ln(8);
}
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
//$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
//$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);

$pdf->Output('reporte.pdf','I');
?>