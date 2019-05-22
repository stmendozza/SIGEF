<?php


		include 'plantilla_inventario.php';

		require 'config.php';



		$sql="SELECT cod_prove, nom_usu, telefono_usu, email, direccion_usu  FROM  tb_provedores, tb_usuarios WHERE cod_usuario_prove = usuario ORDER BY cod_prove ASC ";

		$resultado = $conexion->query( $sql );



		$pdf= new PDF('L');

		// $pdf->AliasNbPage();

		$pdf->AddPage();

		$pdf->Cell(120,5,'Listado de Provedores ',0,1,'L');

		$pdf->SetFillColor(232,232,232);

		$pdf->SetFont('Arial','B',12);

		

		$pdf->Cell(27,6,'CODIGO',1,0,'C',1);

		$pdf->Cell(70,6,'NOMBRE',1,0,'C',1);

		$pdf->Cell(35,6,'TELEFONO',1,0,'C',1);

		$pdf->Cell(70,6,'EMAIL',1,0,'C',1);

		$pdf->Cell(75,6,'DIRECCION',1,1,'C',1);



		$pdf->SetFont('Arial','',10);



		while ($row = $resultado->fetch_assoc())

		{

			$pdf->Cell(27,6,$row['cod_prove'],1,0,'C');

			$pdf->Cell(70,6,utf8_decode($row['nom_usu']) ,1,0,'C');
 
			$pdf->Cell(35,6, $row['telefono_usu'],1,0,'C');

			$pdf->Cell(70,6,utf8_decode($row['email']),1,0,'C');

			$pdf->Cell(75,6,utf8_decode($row['direccion_usu']),1,1,'C');
		}
		$pdf->Output();
?>		