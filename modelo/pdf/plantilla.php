	<link rel="shortcut icon" type="image/x-icon" href="images/logo1.png">
	<?php 
	session_start();

	require 'fpdf/fpdf.php';

	class PDF extends FPDF
	{
		function Header()
		{
			//$this->image('images/sen2.png', 10, 10,50);
			$this->Image('images/logo1.png' , 10, 10,50);
			$this->SetFont('Arial','B',15);
			$this->Cell(50,'','',0);
			$this->Cell(140,5,'FAMISALUD S.A.S.',0,1,'R');
			$this->SetFont('Arial', 'B', 11);
			$this->Cell(50,'','',0);
			$this->Cell(140,5,'NIT 900354851-5',0,1,'R');
			$this->Cell(50,'','',0);
			$this->Cell(140,5,'Hoy: '.date('d-m-Y').'',0,1,'R');
			$this->Cell(50,'','',0);
			$this->Cell(140,5,'Usuario|'.$_SESSION['usuario'].'',0,1,'R');
			$this->Ln(5);	
			
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