
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
    $this->Cell(120);
    // Título
    $this->Cell(30,10,'REGISTRO DE VENTAS E INGRESOS',0,0,'C');
    // Salto de línea
    $this->Ln(10);
    $this->Cell(30,10,'PERIODO:',0,0,'L');
    $this->Cell(30,10,$_GET["periodo"],0,0,'L');
    $this->Ln(5);
    $this->Cell(30,10,'R.U.C.',0,0,'L');
    $this->Cell(30,10,iconv('UTF-8', 'ISO-8859-2', '     R.U.C. N° 20100488699'),0,0,'L');
    $this->Ln(5);
    $this->Cell(30,10,iconv('UTF-8', 'ISO-8859-2', 'APELLIDOS Y NOMBRES, DENOMINACIÓN O RAZÓN SOCIAL:'),0,0,'L');
    $this->Cell(80);
    $this->Cell(30,10,'ORDECUPE E.I.R.L.',0,0,'L');

}
}


$tra=new factura_cabecera();

$reg=$tra->get_conta_ventas_factura_cabecera_detalle($_GET["empresa"],$_GET["mes"],$_GET["anho"]);


	


$html = 'prueba';

$pdf = new PDF('L','mm',array(297,210));
// Primera página
$pdf->AddPage();
$pdf->SetFont('Arial','',8);



$pdf->Ln(10);
						
/*1*/$pdf->Cell(20,5,' ','LTR',0,'L',0);  
/*2*/$pdf->Cell(20,5,' ','LTR',0,'L',0);
/*3*/$pdf->Cell(1,5,'','LTB',0,'R',0);
/*4*/$pdf->Cell(33,5,'COMPROBANTE PAGO','TB',0,'C',0);
/*5*/$pdf->Cell(1,5,'','TBR',0,'R',0);
/*6*/$pdf->Cell(1,5,'','LTB',0,'R',0);
/*7*/$pdf->Cell(48,5,'INFORMACION CLIENTE','TB',0,'C',0);
/*8*/$pdf->Cell(1,5,'','TBR',0,'R',0);
/*9*/$pdf->Cell(17,5,'VALOR','LTR',0,'C',0);  
/*10*/$pdf->Cell(15,5,'BASE','LTR',0,'C',0);
/*11*/$pdf->Cell(1,5,'','LTB',0,'R',0);
/*12*/$pdf->Cell(29,5,'IMPORT OPERAC','TB',0,'C',0);
/*13*/$pdf->Cell(7,5,' ','LTR',0,'L',0);  
/*14*/$pdf->Cell(10,5,'IGV','LTR',0,'C',0);
/*15*/$pdf->Cell(12,5,' ','LTR',0,'L',0);  
/*16*/$pdf->Cell(12,5,' ','LTR',0,'L',0);
/*17*/$pdf->Cell(10,5,' ','LTR',0,'L',0);  
/*18*/$pdf->Cell(1,5,'','LTB',0,'R',0);
/*19*/$pdf->Cell(33,5,'REFER. COMPROBANTE','TB',0,'C',0);
/*20*/$pdf->Cell(1,5,'','TB',0,'R',0);
/*21*/$pdf->Cell(1,5,'','TBR',0,'R',0);
$pdf->Ln();
/*1*/$pdf->Cell(20,5,'FEC. EMISION','LR',0,'C',0); 
/*2*/$pdf->Cell(20,5,'FEC. VENCIMI','LR',0,'C',0); 
/*3*/$pdf->Cell(8,5,'TIPO','LR',0,'C',0);
/*4*/$pdf->Cell(10,5,'SERIE','LR',0,'C',0);
/*5*/$pdf->Cell(17,5,'NUMERO','LR',0,'C',0);
/*6*/$pdf->Cell(8,5,'TIPO','LR',0,'C',0);
/*7*/$pdf->Cell(15,5,'NUMERO','LR',0,'C',0);
/*8*/$pdf->Cell(27,5,'APELLIDOS','LR',0,'C',0);
/*9*/$pdf->Cell(17,5,'FACTURAD','LR',0,'C',0); 
/*10*/$pdf->Cell(15,5,'IMPONIBL','LR',0,'C',0); 
/*11*/$pdf->Cell(15,5,'EXONERA','LR',0,'C',0);
/*12*/$pdf->Cell(15,5,'INAFEC','LR',0,'C',0);
/*13*/$pdf->Cell(7,5,'ISC','LR',0,'C',0); 
/*14*/$pdf->Cell(10,5,'Y/O','LR',0,'C',0); 
/*15*/$pdf->Cell(12,5,'OTROS','LR',0,'C',0); 
/*16*/$pdf->Cell(12,5,'TOTAL','LR',0,'C',0); 
/*17*/$pdf->Cell(10,5,'T.C','LR',0,'C',0); 
/*18*/$pdf->Cell(8,5,'FEC','LR',0,'C',0);
/*19*/$pdf->Cell(5,5,'T','LR',0,'C',0);
/*20*/$pdf->Cell(10,5,'SERIE','LR',0,'C',0);
/*21*/$pdf->Cell(13,5,'NUMERO','LR',0,'C',0);
$pdf->Ln();

/*1*/$pdf->Cell(20,5,'','LBR',0,'L',0);   // empty cell with left,bottom, and right borders
/*2*/$pdf->Cell(20,5,'','LBR',0,'L',0);
/*3*/$pdf->Cell(8,5,'','LRB',0,'L',0);
/*4*/$pdf->Cell(10,5,'','LRB',0,'L',0);
/*5*/$pdf->Cell(17,5,'','LRB',0,'L',0);
/*6*/$pdf->Cell(8,5,'','LRB',0,'L',0);
/*7*/$pdf->Cell(15,5,'','LRB',0,'L',0);
/*8*/$pdf->Cell(27,5,'','LRB',0,'L',0);
/*9*/$pdf->Cell(17,5,'EXPORT','LBR',0,'C',0);   // empty cell with left,bottom, and right borders
/*10*/$pdf->Cell(15,5,' ','LBR',0,'L',0);
/*11*/$pdf->Cell(15,5,'','LRB',0,'L',0);
/*12*/$pdf->Cell(15,5,'','LRB',0,'L',0);
/*13*/$pdf->Cell(7,5,'','LRB',0,'L',0);
/*14*/$pdf->Cell(10,5,'IPM','LRB',0,'C',0);
/*15*/$pdf->Cell(12,5,'','LRB',0,'L',0);
/*16*/$pdf->Cell(12,5,'','LRB',0,'L',0);
/*17*/$pdf->Cell(10,5,'','LRB',0,'L',0);
/*18*/$pdf->Cell(8,5,'','LRB',0,'L',0);
/*19*/$pdf->Cell(5,5,'','LRB',0,'L',0);
/*20*/$pdf->Cell(10,5,'','LRB',0,'L',0);
/*21*/$pdf->Cell(13,5,'','LRB',1,'L',0);


    for ($i=0;$i<count($reg);$i++)				
        {
            $pdf->SetTextColor(0,0,0);
            $pdf->SetFontSize(8);
                      
            /*1*/$pdf->Cell(20, 5,$reg[$i]["fecha"], 1,0, 'C');
            /*2*/$pdf->Cell(20, 5,$reg[$i]["fecha"], 1,0, 'C');
            /*3*/$pdf->Cell(8, 5,$reg[$i]["documento"], 1,0, 'C');
            /*4*/$pdf->Cell(10, 5,$reg[$i]["serie"], 1,0, 'C');
            /*5*/$pdf->Cell(17, 5,$reg[$i]["numero"], 1,0, 'C');
            /*6*/$pdf->Cell(8, 5,$reg[$i]["tipdoc"], 1,0, 'C');
            /*7*/$pdf->Cell(15, 5,$reg[$i]["nrodoc"], 1,0, 'C');
            /*8*/$pdf->Cell(27, 5,$reg[$i]["rsocial"], 1,0, 'C');
            /*9*/$pdf->Cell(17, 5,$reg[$i]["vacio"], 1,0, 'C');
            /*10*/$pdf->Cell(15, 5,$reg[$i]["vacio"], 1,0, 'C');            
            /*11*/$pdf->Cell(15, 5,$reg[$i]["total"], 1,0, 'C');
            /*12*/$pdf->Cell(15, 5,$reg[$i]["vacio"], 1,0, 'C');            
            /*13*/$pdf->Cell(7, 5,$reg[$i]["vacio"], 1,0, 'C');
            /*14*/$pdf->Cell(10, 5,$reg[$i]["vacio"], 1,0, 'C'); 

            /*15*/$pdf->Cell(12, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            /*16*/$pdf->Cell(12, 5,$reg[$i]["total"], 1,0, 'C'); 
            /*17*/$pdf->Cell(10, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            /*18*/$pdf->Cell(8, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            /*19*/$pdf->Cell(5, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            /*20*/$pdf->Cell(10, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            /*21*/$pdf->Cell(13, 5,$reg[$i]["vacio"], 1,1, 'C'); 
        }

$pdf->Output();
?>

