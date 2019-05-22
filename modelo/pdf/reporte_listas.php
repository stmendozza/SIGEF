<?php


		include 'plantilla.php';

		require 'config.php';



		$sql="SELECT * FROM  tb_productos WHERE cantidad <= cantidad_min ORDER BY cantidad ASC ";

		$resultado = $conexion->query( $sql );



		$pdf= new PDF();

		// $pdf->AliasNbPage();

		$pdf->AddPage();

		$pdf->Cell(120,5,'Listado de Agotados ',0,1,'L');

		$pdf->SetFillColor(232,232,232);

		$pdf->SetFont('Arial','B',12);

		

		$pdf->Cell(35,6,'COD.',1,0,'C',1);

		$pdf->Cell(70,6,'DESCRIPCION',1,0,'C',1);

		$pdf->Cell(25,6,'COSTO',1,0,'C',1);

		$pdf->Cell(20,6,'STOCK',1,0,'C',1);

		$pdf->Cell(40,6,'FECHA REGISTRO',1,1,'C',1);



		$pdf->SetFont('Arial','',10);



		while ($row = $resultado->fetch_assoc())

		{

			$pdf->Cell(35,6,$row['cod_prod'],1,0,'C');

			$pdf->Cell(70,6,utf8_decode($row['descripcion']) ,1,0,'C');
 
			$pdf->Cell(25,6, $row['precio_costo'],1,0,'C');

			$pdf->Cell(20,6,utf8_decode($row['cantidad']),1,0,'C');

			$pdf->Cell(40,6,utf8_decode($row['fecha_registro_prod']),1,1,'C');
		}
		$pdf->Output();
?>		