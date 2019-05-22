<?php 	 

	require '../modelo/pdf/fpdf/fpdf.php';



	class PDF extends FPDF

	{

		function Header()

		{

			$this->image('images/sen2.png', 10, 10,50);



			$this->SetFont('Arial','B',15);

			$this->Cell(40);

			

			$this->Cell(150,20,'STMENDOZZA|SENA GUAVIARE',0,0,'R');

			$this->Ln(20);

		}



		// function Footer()

		// {

		// 	$this->SetY(-15);

		// 	$this->SetFont('Arial','I',8);

		// 	$this->Cell(0,10,'Pagina '$this->PageNo().'/{nb}',0,0,'C');



		// }

		function Footer()

		{

		    //Footer de la pagina

		    $this->SetY(-15);

		    $this->SetFont('Arial','I',8);

		    $this->SetTextColor(128);

		    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');

		}  

	}





?>