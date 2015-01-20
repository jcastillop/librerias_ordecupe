
<?php

require_once("../../../../conexiones/class_historico_ventas_pdf.php");

require("../../../../paquetes/fpdf/fpdf.php");



class PDF extends FPDF
{

// Cabecera de página
function Header()
{
    // Logo
    
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,10,'REGISTRO DE VENTAS E INGRESOS',0,0,'C');
    // Salto de línea
    $this->Ln(10);
    $this->Cell(30,10,'PERIODO:',0,0,'L');
    $this->Cell(30,10,'Mes Bello',0,0,'L');
    $this->Ln(5);
    $this->Cell(30,10,'RUC:',0,0,'L');
     $this->Cell(30,10,'5555555',0,0,'L');
    $this->Ln(5);
    $this->Cell(30,10,iconv('UTF-8', 'ISO-8859-2', 'APELLIDOS Y NOMBRES, DENOMINACIÓN O RAZÓN SOCIAL:'),0,0,'L');
    $this->Cell(80);
     $this->Cell(30,10,'Wapetones 3000',0,0,'L');

}
}


$tra=new factura_cabecera();

$reg=$tra->get_conta_ventas_factura_cabecera_detalle($_GET["empresa"],$_GET["mes"],$_GET["anho"]);


	


$html = 'prueba';

$pdf = new PDF();
// Primera página
$pdf->AddPage();
$pdf->SetFont('Arial','',8);



$pdf->Ln(10);
						
$pdf->Cell(20,5,' ','LTR',0,'L',0);  
$pdf->Cell(20,5,' ','LTR',0,'L',0);


$pdf->Cell(1,5,'','LTB',0,'R',0);
$pdf->Cell(33,5,'COMPROBANTE PAGO','TB',0,'C',0);
$pdf->Cell(1,5,'','TBR',0,'R',0);


$pdf->Cell(1,5,'','LTB',0,'R',0);
$pdf->Cell(48,5,'INFORMACION CLIENTE','TB',0,'C',0);
$pdf->Cell(1,5,'','TBR',0,'R',0);

$pdf->Cell(23,5,' ','LTR',0,'L',0);  
$pdf->Cell(23,5,' ','LTR',0,'L',0);

$pdf->Cell(1,5,'','LTB',0,'R',0);
$pdf->Cell(29,5,'IMPORT OPERAC','TB',0,'C',0);




                $pdf->Ln();

$pdf->Cell(20,5,'FEC. EMISION','LR',0,'C',0); 
$pdf->Cell(20,5,'FEC. VENCIMI','LR',0,'C',0); 

$pdf->Cell(8,5,'TIPO','LR',0,'C',0);
$pdf->Cell(10,5,'SERIE','LR',0,'C',0);
$pdf->Cell(17,5,'NUMERO','LR',0,'C',0);

$pdf->Cell(8,5,'TIPO','LR',0,'C',0);
$pdf->Cell(15,5,'NUMERO','LR',0,'C',0);
$pdf->Cell(27,5,'APELLIDOS','LR',0,'C',0);

$pdf->Cell(23,5,'FACT. EXPORT','LR',0,'C',0); 
$pdf->Cell(23,5,'BASE IMPONIB','LR',0,'C',0); 

$pdf->Cell(15,5,'EXONERA','LR',0,'C',0);
$pdf->Cell(15,5,'INAFEC','LR',0,'C',0);

                $pdf->Ln();

$pdf->Cell(20,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(20,5,'','LBR',0,'L',0);

$pdf->Cell(8,5,'','LRB',0,'L',0);
$pdf->Cell(10,5,'','LRB',0,'L',0);
$pdf->Cell(17,5,'','LRB',0,'L',0);

$pdf->Cell(8,5,'','LRB',0,'L',0);
$pdf->Cell(15,5,'','LRB',0,'L',0);
$pdf->Cell(27,5,'','LRB',0,'L',0);

$pdf->Cell(23,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
$pdf->Cell(23,5,'','LBR',0,'L',0);

$pdf->Cell(15,5,'','LRB',0,'L',0);
$pdf->Cell(15,5,'','LRB',0,'L',0);

                $pdf->Ln();
                $pdf->Ln();
                $pdf->Ln();

						


$pdf->Output();
?>
