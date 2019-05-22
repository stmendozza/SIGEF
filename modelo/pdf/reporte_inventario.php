<?php 

		include 'plantilla_inventario.php';

		require 'config.php';



		$sql="SELECT * FROM  tb_productos,tb_categorias_productos,tb_tipos_productos WHERE cod_categ_prod = cod_categ AND cod_tipo_prod = cod_tipo  ORDER BY cod_prod ASC ";

		$resultado = $conexion->query( $sql );



		$pdf= new PDF('L');

		// $pdf->AliasNbPage();

		$pdf->AddPage();

		$pdf->Cell(120,5,'Reporte de Disponible ',0,1,'L');

		$pdf->SetFillColor(232,232,232);

		$pdf->SetFont('Arial','B',12);

		

		$pdf->Cell(35,6,'CODIGO',1,0,'C',1);
		$pdf->Cell(65,6,'DESCRIPCION PRODUCTO',1,0,'C',1);
		$pdf->Cell(20,6,'COSTO',1,0,'C',1);
		$pdf->Cell(20,6,'CANT',1,0,'C',1);
		$pdf->Cell(25,6,'ESTADO',1,0,'C',1);
		$pdf->Cell(20,6,'R. FORM',1,0,'C',1);
		$pdf->Cell(30,6,'CATEG',1,0,'C',1);
		$pdf->Cell(30,6,'TIPO',1,0,'C',1);		
		$pdf->Cell(32,6,'F. REGISTRO',1,1,'C',1);



		$pdf->SetFont('Arial','',10);



		while ($row = $resultado->fetch_assoc())

		{

			$pdf->Cell(35,6,$row['cod_prod'],1,0,'C');
			$pdf->Cell(65,6,utf8_decode($row['descripcion']) ,1,0,'L');
			$pdf->Cell(20,6, $row['precio_costo'],1,0,'C');
			$pdf->Cell(20,6, $row['cantidad'],1,0,'C');
			$pdf->Cell(25,6, $row['estado'],1,0,'C');
			$pdf->Cell(20,6, $row['requiere_formula'],1,0,'C');
			$pdf->Cell(30,6, $row['nom_categ'],1,0,'C');
			$pdf->Cell(30,6, $row['nom_tipo'],1,0,'C');
			$pdf->Cell(32,6,utf8_decode($row['fecha_registro_prod']),1,1,'C');

		}
		$pdf->Output();
?>		