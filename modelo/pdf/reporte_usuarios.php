<?php

		include 'plantilla_inventario.php';

		require 'config.php';



		$sql="SELECT * FROM  tb_usuarios, tb_roles WHERE cod_rol_usu = cod_rol ORDER BY usuario ASC ";

		$resultado = $conexion->query( $sql );



		$pdf= new PDF('L');

		// $pdf->AliasNbPage();

		$pdf->AddPage();

		$pdf->Cell(120,5,'Listado de Usuarios ',0,1,'L');

		$pdf->SetFillColor(232,232,232);

		$pdf->SetFont('Arial','B',12);

		



		$pdf->Cell(30,6,'USUARIO',1,0,'C',1);

		$pdf->Cell(60,6,'NOMBRE',1,0,'C',1);

		$pdf->Cell(25,6,'TELEFONO',1,0,'C',1);

		$pdf->Cell(70,6,'DIRECCION',1,0,'C',1);		

		$pdf->Cell(60,6,'CORREO ELECTRONICO',1,0,'C',1);

		$pdf->Cell(30,6,'ROL',1,1,'C',1);

		// $pdf->Cell(20,6,'FECHA REGISTRO',1,1,'C',1);

		

		

		$pdf->SetFont('Arial','',10);



		while ($row = $resultado->fetch_assoc())

		{


		$pdf->Cell(30,6,utf8_decode($row['usuario']),1,0,'C');

		$pdf->Cell(60,6,utf8_decode($row['nom_usu']) ,1,0,'C');

		$pdf->Cell(25,6, $row['telefono_usu'],1,0,'C');

		$pdf->Cell(70,6, $row['direccion_usu'],1,0,'C');

		$pdf->Cell(60,6, $row['email'],1,0,'C');

		$pdf->Cell(30,6, $row['nom_rol'],1,1,'C');

		// $pdf->Cell(30,6, $row['fecha_registro_usu'],1,1,'C');

			

		}





		$pdf->Output();

?>		