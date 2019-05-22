<?php


		include 'plantilla.php';

		require 'config.php';



		$sql="SELECT *  FROM  tb_tipos_productos ORDER BY cod_tipo ASC ";

		$resultado = $conexion->query( $sql );



		$pdf= new PDF();

		// $pdf->AliasNbPage();

		$pdf->AddPage();

		$pdf->Cell(120,5,'Listado de Tipos de Productos ',0,1,'L');

		$pdf->SetFillColor(232,232,232);

		$pdf->SetFont('Arial','B',12);

		

		$pdf->Cell(25,6,'CODIGO',1,0,'C',1);

		$pdf->Cell(65,6,'NOMBRE',1,1,'C',1);



		$pdf->SetFont('Arial','',10);



		while ($row = $resultado->fetch_assoc())

		{

			$pdf->Cell(25,6,$row['cod_tipo'],1,0,'C');

			$pdf->Cell(65,6,utf8_decode($row['nom_tipo']) ,1,1,'C');
 
		}
		$pdf->Output();
?>		