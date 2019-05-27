<?php


include 'plantilla.php';

require 'config.php';



$sql="SELECT *  FROM  tb_promociones ORDER BY cod_promo ASC ";

$resultado = $conexion->query( $sql );



$pdf= new PDF();

		// $pdf->AliasNbPage();

$pdf->AddPage();

$pdf->Cell(120,5,'Listado de Promos ',0,1,'L');

$pdf->SetFillColor(232,232,232);

$pdf->SetFont('Arial','B',12);



$pdf->Cell(25,6,'CODIGO',1,0,'C',1);

$pdf->Cell(65,6,'NOMBRE',1,1,'C',1);


$pdf->SetFont('Arial','',10);



while ($row = $resultado->fetch_assoc())

{

	$pdf->Cell(25,6,$row['cod_promo'],1,0,'C');

	$pdf->Cell(65,6,utf8_decode($row['descripcion_promo']) ,1,1,'C');
	
}
$pdf->Output();
?>		