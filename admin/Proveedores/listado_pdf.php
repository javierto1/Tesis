<?php
require('../../fpdf/fpdf.php');
require('../includes_admin/dbcon.php');
$rol= $_GET['rol'];

$pdf = new FPDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Image('../Usuarios/cp.png' , 10 ,8, 25 , 25,'PNG');
$pdf->Cell(28, 10, '', 0);
$pdf->Cell(220, 10,utf8_decode('Gráfica No Convencional'), 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
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


$pdf->Ln(15);

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(105, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE PROVEEDORES', 0,'L');
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(7, 8,utf8_decode( 'Nº'), 0);
$pdf->Cell(20, 8,utf8_decode( 'Nombre'), 0);
$pdf->Cell(20, 8,utf8_decode( 'Apellido'), 0);
$pdf->Cell(35, 8,utf8_decode( 'Razon Social'), 0);
$pdf->Cell(20, 8,utf8_decode( 'CUIT'), 0);
$pdf->Cell(20, 8,utf8_decode( 'CUIL'), 0);
$pdf->Cell(38, 8,utf8_decode( 'E-Mail'), 0);
$pdf->Cell(25, 8,utf8_decode( 'Teléfono'), 0);
$pdf->Cell(35, 8,utf8_decode( 'Calle'), 0);
$pdf->Cell(25, 8,utf8_decode( 'Barrio'), 0);
$pdf->Cell(30, 8,utf8_decode( 'Ciudad'), 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$productos = mysql_query("SELECT * FROM proveedor");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($productos2 = mysql_fetch_array($productos)){
	$item = $item+1;
	//$totaluni = $totaluni + $productos2['precio_unit'];
	//$totaldis = $totaldis + $productos2['precio_dist'];
	$pdf->Cell(7, 8, $item, 0);
	$pdf->Cell(20, 8,utf8_decode( $productos2['nombre']), 0);
	$pdf->Cell(20, 8,utf8_decode( $productos2['apellido']), 0);
	$pdf->Cell(35, 8,utf8_decode( $productos2['razon_social']), 0);
	$pdf->Cell(20, 8,utf8_decode( $productos2['cuit']), 0);
	$pdf->Cell(20, 8,utf8_decode( $productos2['cuil']), 0);
	$pdf->Cell(38, 8,utf8_decode( $productos2['mail']), 0);
	$pdf->Cell(25, 8,utf8_decode( $productos2['telefono']), 0);
	$pdf->Cell(35, 8,utf8_decode( $productos2['calle']).' '.$productos2['numero'], 0);
	$pdf->Cell(25, 8,utf8_decode( $productos2['barrio']), 0);
	$pdf->Cell(30, 8,utf8_decode( $productos2['ciudad']), 0);
	
	$pdf->Ln(8);
}
//$pdf->SetFont('Arial', 'B', 8);
//$pdf->Cell(114,8,'',0);
//$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
//$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);


$pdf->Output();
?>