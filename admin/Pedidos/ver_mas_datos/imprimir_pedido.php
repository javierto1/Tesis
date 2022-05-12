<?php
$id_pedido = $_GET['id_pedido'];
//$rol = 2;

require('../../reportes/fpdf/fpdf.php');
require('../../includes_admin/dbcon.php');
require('../../includes_admin/fecha_acomodada.php');

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



$pdf = new PDF('P');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial', '', 10);

$pdf->Image('../../reportes/cp.png' , 10 ,8, 25 , 25,'PNG');
$pdf->Cell(28, 10, '', 0);
$pdf->Cell(130, 10,utf8_decode('Gráfica No Convencional'), 0);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(50, 10, 'Fecha: '.fechaNormal(date('d-m-Y')).'', 0);
$pdf->Ln(5);

$pdf->Cell(28, 10, '', 0);
$pdf->Cell(130, 10,utf8_decode('Calle Crisol 18, Nueva Córdoba, Córdoba'), 0);
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
$pdf->Ln(10);
$pdf->Cell(75, 8, '', 0);
$pdf->Cell(100, 8, 'Remito Pedido Cliente', 0);
$pdf->Ln(23);


$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 8, ' ', 0);
$pdf->Cell(40, 8, 'Detalle cliente: ', 0);
$pdf->Cell(40, 8, ' ', 0);
$pdf->Cell(40, 8, ' ', 0);
$pdf->Cell(25, 8, ' ', 0);

$pdf->Ln(8);

$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(30, 8, ' ', 0);
$pdf->Cell(40, 8, 'Nombre', 0);
$pdf->Cell(40, 8, 'Username', 0);
$pdf->Cell(40, 8, 'Documento', 0);
$pdf->Cell(25, 8, 'Telefono', 0);

$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$usuarios = mysql_query("select pc.id_cliente, pc.id_pedido, pc.id_producto, pc.id_estado, pc.precio_vta,
															 p.denominacion,
															 dp.id, dp.apellido, dp.nombre, dp.username, dp.mail, dp.telefono, dp.telefono, dp.fecha_alta, dp.barrio, dp.documento, dp.tipo_documento, dp.calle, dp.numero,
															 ep.id_estado, ep.denominacion as deno
															 
													 from 
															pedido_cliente pc,
															producto p,
															datos_personales dp,
															estado_pedido ep
															
													where 	pc.id_cliente = dp.id AND 
															pc.id_producto = p.id_producto AND 
															pc.id_estado = ep.id_estado AND
															pc.id_pedido='$id_pedido'");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($usuarios2 = mysql_fetch_array($usuarios)){
	$item = $item+1;
	//$totaluni = $totaluni + $productos2['precio_unit'];
	//$totaldis = $totaldis + $productos2['precio_dist'];
	$pdf->Cell(30, 8, '', 0);
	$pdf->Cell(40, 8, ''.utf8_decode($usuarios2['apellido'].', '.$usuarios2['nombre']), 0);
	$pdf->Cell(40, 8, ''.utf8_decode($usuarios2['username']), 0);
	$pdf->Cell(40, 8, $usuarios2['telefono'], 0);
	$pdf->Cell(25, 8, $usuarios2['documento'], 0);

	$pdf->Ln(16);
	
	
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(30, 8, ' ', 0);
	$pdf->Cell(40, 8, 'Pedido: ', 0);
	$pdf->Cell(40, 8, ' ', 0);
	$pdf->Cell(40, 8, ' ', 0);
	

	$pdf->Ln(8);

	$pdf->SetFont('Arial', 'B', 11);
	$pdf->Cell(30, 8, ' ', 0);
	$pdf->Cell(40, 8, ''.$usuarios2['denominacion'], 0);
	$pdf->Cell(40, 8, '', 0);
	$pdf->Cell(25, 8, 'Precio Final: $'.$usuarios2['precio_vta'] , 0);
	
	
}

$pdf->Ln(10);

$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(30, 8,  ' ', 0);
$pdf->Cell(40, 8, 'Detalle de pedido:', 0);
$pdf->Cell(60, 8, ' ', 0);
$pdf->Cell(70, 8, ' ', 0);
$pdf->Cell(25, 8, ' ', 0);
$pdf->Cell(25, 8, ' ', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);
//CONSULTA
$usuarios = mysql_query("SELECT dp.id_pedido,dp.id_especifica,dp.id_tipo,
								e.id_especifica,e.codigo,e.denominacion,
								t.id_tipo,t.des_especifica 
						 
						 FROM 	detalle_pedido dp, 
								especifica e, 
								tipo t
						 
						 WHERE 	dp.id_especifica = e.id_especifica AND 
								dp.id_tipo = t.id_tipo AND 
								dp.id_pedido='$id_pedido'");
$item = 0;
$totaluni = 0;
$totaldis = 0;
while($usuarios2 = mysql_fetch_array($usuarios)){
	$item = $item+1;
	//$totaluni = $totaluni + $productos2['precio_unit'];
	//$totaldis = $totaldis + $productos2['precio_dist'];
	$pdf->Cell(30, 8, '', 0);
	$pdf->Cell(40, 8, utf8_decode($usuarios2['des_especifica'].': '), 0);
	$pdf->Cell(60, 8, utf8_decode($usuarios2['denominacion']), 0);
	$pdf->Cell(40, 8, utf8_decode('CÓDIGO: '.$usuarios2['codigo']), 0);
	
	$pdf->Ln(8);
}
	$pdf->Ln(40);
	$pdf->SetFont('Arial', 'B', 10);
	$pdf->Cell(45, 8, ' ', 0);
	$pdf->Cell(50, 8, '', 0);
	$pdf->Cell(50, 8, ' ', 0);
	$pdf->Cell(50, 8, 'Firma................  ', 0);


$pdf->Cell(40, 8, ' ', 0);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(104,8,'',0);
//$pdf->Cell(31,8,'Total Unitario: S/. '.$totaluni,0);
//$pdf->Cell(32,8,'Total Dist: S/. '.$totaldis,0);

$pdf->Output('reporte.pdf','I');
?>