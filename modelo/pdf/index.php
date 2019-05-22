<?php
		include '../modelo/pdf/plantilla.php';
		require '../connections/config.php';

		$sql="SELECT * FROM  tb_productos ORDER BY cod_producto ASC ";
		$resultado = $conexion->query( $sql );

		$pdf= new PDF();
		//$pdf->AliasNbPage();
		$pdf->AddPage();

		$pdf->SetFillColor(232,232,232);
		$pdf->SetFont('Arial','B',12);
		
		$pdf->Cell(50,6,'CODIGO PRODUCTO',1,0,'C',1);
		$pdf->Cell(60,6,'NOMBRE',1,0,'C',1);
		$pdf->Cell(30,6,'CANTIDAD',1,0,'C',1);
		$pdf->Cell(40,6,'ESTADO',1,1,'C',1);

		$pdf->SetFont('Arial','',10);

		while ($row = $resultado->fetch_assoc())
		{
			$pdf->Cell(50,6,$row['cod_producto'],1,0,'C');
			$pdf->Cell(60,6,utf8_decode($row['descripcion']) ,1,0,'C');
			$pdf->Cell(30,6, $row['cantidad'],1,0,'C');
			$pdf->Cell(40,6,$row['estado'],1,1,'C');
		}


		$pdf->Output();
?>