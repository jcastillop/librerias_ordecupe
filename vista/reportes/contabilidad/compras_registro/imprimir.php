<?php

require_once("../../../../conexiones/class_historico_compras_pdf.php");

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
      $this->Cell(30,10,'REGISTRO DE COMPRAS E INGRESOS',0,0,'C');
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

$tra=new historico_compras();
$reg=$tra->get_conta_compras($_GET["empresa"],$_GET["mes"],$_GET["anho"]);

$html = 'prueba';

$pdf = new PDF('L','mm',array(610,210));
// Primera página
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

$pdf->Ln(10);
						
/*1*/$pdf->Cell(20,5,' ','LTR',0,'C',0);  
/*2*/$pdf->Cell(20,5,'FECHA','LTR',0,'C',0);
/*3*/$pdf->Cell(25,5,'FECHA','LTR',0,'C',0);

/*4*/$pdf->Cell(1,5,'','LTB',0,'R',0);
/*5*/$pdf->Cell(33,5,'COMPROBANTE PAGO','TB',0,'C',0);
/*5*/$pdf->Cell(1,5,'','TBR',0,'R',0);

     $pdf->Cell(30,5,' ','LTR',0,'L',0);

/*9*/$pdf->Cell(1,5,' ','LTB',0,'R',0);
/*10*/$pdf->Cell(63,5,'INNFORMACION PROVEEDOR','TB',0,'C',0);
/*11*/$pdf->Cell(1,5,'','TBR',0,'R',0);

/*1*/$pdf->Cell(45,5,'ADQUISIONES GRABADAS','LTR',0,'C',0);  
/*2*/$pdf->Cell(48,5,'ADQUISIONES GRABADAS','LTR',0,'C',0);
/*3*/$pdf->Cell(45,5,'ADQUISIONES GRABADAS','LTR',0,'C',0);
/*1*/$pdf->Cell(45,5,'','LTR',0,'C',0);  
/*2*/$pdf->Cell(10,5,' ','LTR',0,'C',0);
/*3*/$pdf->Cell(25,5,'','LTR',0,'C',0);  
/*2*/$pdf->Cell(20,5,'IMPORTE','LTR',0,'C',0);
/*3*/$pdf->Cell(35,5,'NRO DE COMPROBANTE ','LTR',0,'C',0);

/*9*/$pdf->Cell(1,5,' ','LTB',0,'L',0);
/*10*/$pdf->Cell(35,5,'CONST. DEPOS. DETRAC.','TB',0,'C',0);
/*11*/$pdf->Cell(1,5,'','TBR',0,'R',0);

/*3*/$pdf->Cell(20,5,' ','LTR',0,'L',0);

/*9*/$pdf->Cell(1,5,' ','LT',0,'L',0);
/*10*/$pdf->Cell(61,5,'REFERENCIA DEL','T',0,'C',0);
/*11*/$pdf->Cell(1,5,'','TR',0,'R',0);



$pdf->Ln();
/*1*/$pdf->Cell(20,5,'NRO','LR',0,'C',0); 
/*1*/$pdf->Cell(20,5,'EMISION','LR',0,'C',0); 
/*2*/$pdf->Cell(25,5,'VENCIMIMIENTO','LR',0,'C',0); 

/*3*/$pdf->Cell(8,5,'TIPO','LR',0,'C',0);
/*4*/$pdf->Cell(10,5,'SERIE','LR',0,'C',0);
/*5*/$pdf->Cell(17,5,'AÑO','LR',0,'C',0);

/*7*/$pdf->Cell(30,5,'NRO COMPROBANTE','LR',0,'C',0);

/*7*/$pdf->Cell(30,5,'TIPO DOCUMENTO','LR',0,'C',0);
/*8*/$pdf->Cell(35,5,'NOMBRES Y','LR',0,'C',0); 

/*1*/$pdf->Cell(45,5,'DESTINADAS A OPERACIONES','LR',0,'C',0); 
/*1*/$pdf->Cell(48,5,'DESTINADAS A OPERACIONES','LR',0,'C',0); 
/*2*/$pdf->Cell(45,5,'DESTINADAS A OPERACIONES','LR',0,'C',0); 
/*2*/$pdf->Cell(45,5,'VALOR DE LAS ADQUISIONES','LR',0,'C',0); 
/*2*/$pdf->Cell(10,5,'ISC','LR',0,'C',0); 
/*2*/$pdf->Cell(25,5,'OTROS TRIBUTOS','LR',0,'C',0); 
/*2*/$pdf->Cell(20,5,'TOTAL','LR',0,'C',0); 
/*2*/$pdf->Cell(35,5,'DE PAGO EMITIDO POR','LR',0,'C',0); 

/*1*/$pdf->Cell(19,5,'NUMERO','LR',0,'C',0); 
/*2*/$pdf->Cell(18,5,'FECHA','LR',0,'C',0); 

/*2*/$pdf->Cell(20,5,'TIPO','LR',0,'C',0); 


/*9*/$pdf->Cell(1,5,' ','LB',0,'L',0);
/*10*/$pdf->Cell(61,5,'COMPROBANTE DE PAGO','B',0,'C',0);
/*11*/$pdf->Cell(1,5,'','BR',0,'R',0);

$pdf->Ln();

/*1*/$pdf->Cell(20,5,'CORRELATIVO','LR',0,'C',0);  
/*2*/$pdf->Cell(20,5,' ','LR',0,'L',0);
/*3*/$pdf->Cell(25,5,' ','LR',0,'L',0);

/*1*/$pdf->Cell(8,5,' ','LR',0,'L',0);  
/*2*/$pdf->Cell(10,5,' ','LR',0,'L',0);
/*3*/$pdf->Cell(17,5,' ','LR',0,'L',0);

/*3*/$pdf->Cell(30,5,' ','LR',0,'L',0);

/*3*/$pdf->Cell(30,5,' ','LR',0,'L',0);
/*3*/$pdf->Cell(35,5,'APELLIDOS','LR',0,'C',0);

/*1*/$pdf->Cell(45,5,'GRABADAS Y/O EXPORTACION','LR',0,'C',0); 
/*1*/$pdf->Cell(48,5,'GRABADAS Y/O EXPORTACION.','LR',0,'C',0); 
/*2*/$pdf->Cell(45,5,'NO GRABADAS','LR',0,'C',0); 
/*2*/$pdf->Cell(45,5,'NO GRABADAS','LR',0,'C',0); 
/*2*/$pdf->Cell(10,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(25,5,'Y CARGOS','LR',0,'C',0); 
/*2*/$pdf->Cell(20,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(35,5,'SUJETO NO DOMICILIADO','LR',0,'C',0); 

/*1*/$pdf->Cell(19,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(18,5,'EMISION','LR',0,'C',0); 

/*2*/$pdf->Cell(20,5,'DE CAMBIO','LR',0,'C',0); 

/*10*/$pdf->Cell(11,5,'FECHA','LR',0,'C',0); 
/*11*/$pdf->Cell(11,5,'TIPO','LR',0,'C',0);
/*12*/$pdf->Cell(11,5,'SERIE','LR',0,'C',0);
/*13*/$pdf->Cell(30,5,'NRO COMPROBANTE','LR',0,'C',0); 

$pdf->Ln();

/*1*/$pdf->Cell(20,5,' ','LR',0,'L',0);  
/*2*/$pdf->Cell(20,5,' ','LR',0,'L',0);
/*3*/$pdf->Cell(25,5,' ','LR',0,'L',0);

/*1*/$pdf->Cell(8,5,' ','LR',0,'L',0);  
/*2*/$pdf->Cell(10,5,' ','LR',0,'L',0);
/*3*/$pdf->Cell(17,5,' ','LR',0,'L',0);

/*3*/$pdf->Cell(30,5,' ','LR',0,'L',0);

/*3*/$pdf->Cell(30,5,' ','LR',0,'L',0);
/*3*/$pdf->Cell(35,5,'','LR',0,'L',0);

/*1*/$pdf->Cell(45,5,'','LR',0,'C',0); 
/*1*/$pdf->Cell(48,5,'Y A OPERACIONES NO GRABADAS','LR',0,'C',0); 
/*2*/$pdf->Cell(45,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(45,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(10,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(25,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(20,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(35,5,'','LR',0,'C',0); 

/*1*/$pdf->Cell(19,5,'','LR',0,'C',0); 
/*2*/$pdf->Cell(18,5,'','LR',0,'C',0); 

/*2*/$pdf->Cell(20,5,'','LR',0,'C',0); 

/*10*/$pdf->Cell(11,5,'','LR',0,'C',0); 
/*11*/$pdf->Cell(11,5,'','LR',0,'C',0);
/*12*/$pdf->Cell(11,5,'','LR',0,'C',0);
/*13*/$pdf->Cell(30,5,' DE PAGO','LR',1,'C',0); 


    for ($i=0;$i<count($reg);$i++)				
        {
            $pdf->SetTextColor(0,0,0);
            $pdf->SetFontSize(6);
                      
            $pdf->Cell(20, 5,$reg[$i]["var_cod_comp_cab"], 1,0, 'C');
            $pdf->Cell(20, 5,$reg[$i]["date_fec_emi_comp_cab"], 1,0, 'C');
            $pdf->Cell(25, 5,$reg[$i]["date_fec_rec_comp_cab"], 1,0, 'C');

            $pdf->Cell(8, 5,$reg[$i]["vacio"], 1,0, 'C');
            $pdf->Cell(10, 5,$reg[$i]["vacio"], 1,0, 'C');
            $pdf->Cell(17, 5,$reg[$i]["vacio"], 1,0, 'C');
            
            $pdf->Cell(30, 5,$reg[$i]["vacio"], 1,0, 'C');
            
            $pdf->Cell(30, 5,$reg[$i]["int_nrodoc_prov"], 1,0, 'C');
            $pdf->Cell(35, 5,$reg[$i]["var_rsoc_prov"], 1,0, 'C');
            
            $pdf->Cell(45, 5,$reg[$i]["dec_val_comp_det"], 1,0, 'C');            
            $pdf->Cell(48, 5,$reg[$i]["vacio"], 1,0, 'C');
            $pdf->Cell(45, 5,$reg[$i]["vacio"], 1,0, 'C');            
            $pdf->Cell(45, 5,$reg[$i]["vacio"], 1,0, 'C');
            $pdf->Cell(10, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            $pdf->Cell(25, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            $pdf->Cell(20, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            $pdf->Cell(35, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            
            $pdf->Cell(19, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            $pdf->Cell(18, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            
            $pdf->Cell(20, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            
            $pdf->Cell(11, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            $pdf->Cell(11, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            $pdf->Cell(11, 5,$reg[$i]["vacio"], 1,0, 'C'); 
            $pdf->Cell(30, 5,$reg[$i]["vacio"], 1,1, 'C');
        }

$pdf->Output();
?>

