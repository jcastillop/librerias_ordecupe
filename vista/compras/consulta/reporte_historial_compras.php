
<?php

require_once("../../../conexiones/class_historico_compras.php");
require("fpdf/fpdf.php");


class PDF extends FPDF
{
var $B;
var $I;
var $U;
var $HREF;

function PDF($orientation='P', $unit='mm', $size='A4')
{
    // Llama al constructor de la clase padre
    $this->FPDF($orientation,$unit,$size);
    // Iniciación de variables
    $this->B = 0;
    $this->I = 0;
    $this->U = 0;
    $this->HREF = '';
}

function WriteHTML($html)
{
    // Intérprete de HTML
    $html = str_replace("\n",' ',$html);
    $a = preg_split('/<(.*)>/U',$html,-1,PREG_SPLIT_DELIM_CAPTURE);
    foreach($a as $i=>$e)
    {
        if($i%2==0)
        {
            // Text
            if($this->HREF)
                $this->PutLink($this->HREF,$e);
            else
                $this->Write(5,$e);
        }
        else
        {
   
            // Etiqueta
            if($e[0]=='/')
                $this->CloseTag(strtoupper(substr($e,1)));
            else
            {
                // Extraer atributos
                $a2 = explode(' ',$e);
                $tag = strtoupper(array_shift($a2));
                $attr = array();
                foreach($a2 as $v)
                {
                    if(preg_match('/([^=]*)=["\']?([^"\']*)/',$v,$a3))
                        $attr[strtoupper($a3[1])] = $a3[2];
                }
                $this->OpenTag($tag,$attr);
            }
        }
    }
}

function OpenTag($tag, $attr)
{
    // Etiqueta de apertura
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,true);
    if($tag=='A')
        $this->HREF = $attr['HREF'];
    if($tag=='BR')
        $this->Ln(5);
}

function CloseTag($tag)
{
    // Etiqueta de cierre
    if($tag=='B' || $tag=='I' || $tag=='U')
        $this->SetStyle($tag,false);
    if($tag=='A')
        $this->HREF = '';
}

function SetStyle($tag, $enable)
{
    // Modificar estilo y escoger la fuente correspondiente
    $this->$tag += ($enable ? 1 : -1);
    $style = '';
    foreach(array('B', 'I', 'U') as $s)
    {
        if($this->$s>0)
            $style .= $s;
    }
    $this->SetFont('',$style);
}

function PutLink($URL, $txt)
{
    // Escribir un hiper-enlace
    $this->SetTextColor(0,0,255);
    $this->SetStyle('U',true);
    $this->Write(5,$txt,$URL);
    $this->SetStyle('U',false);
    $this->SetTextColor(0);
}
}




	


$html = 'prueba';

$pdf = new PDF();
// Primera página
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

$link = $pdf->AddLink();












/**********                 **********/	
	

	
	
	
	

	

	
	
/**********                 **********/	
/**********                 **********/	
	$pdf->SetXY(10, 17);
	$pdf->SetFontSize(18);
	$pdf->Cell(10, 8, 'ORDEN DE COMPRA: ', 0, 'C');
	
	

	


	

	





$pdf->Ln(10);
	
	                    
						$pdf->SetFillColor(150,50,150);
                        $pdf->SetDrawColor(0,0,0);
                        $pdf->SetTextColor(0,0,0);
						$pdf->SetFontSize(10);
						
						
						$pdf->Cell(25, 5,'COD. IMPORT', 1,0, 'C');
					
					
						$pdf->Cell(35, 5,'EMPRESA', 1,0, 'C');
						
						$pdf->Cell(35, 5,'SUCURSAL', 1,0, 'C');
						$pdf->Cell(25, 5,'FECHA', 1,1, 'C');
						//$pdf->Cell(25, 5,'', 1,0, 'C');
						//$pdf->Cell(25, 5,'', 1,1, 'C');
						
						
	$tra= new ordcomp_cabecera();
$reg=$tra->get_ordcomp_cabecera_pdf(($_GET['cod_emp']),($_GET['cod_suc']),($_GET['var_comp']));
					
					for ($i=0;$i<count($reg);$i++)
					{
						
						
						
						
						
						
						
						$pdf->SetTextColor(0,0,0);
								$pdf->SetFontSize(8);
						$pdf->Cell(25, 5,$reg[$i]["cod_impor"], 1,0, 'C');
						
						$pdf->Cell(35, 5,$reg[$i]["var_nom_emp"], 1,0, 'C');
					
						$pdf->Cell(35, 5,$reg[$i]["var_nom_suc"], 1,0, 'C');
						$pdf->Cell(25, 5,$reg[$i]["fecha"], 1,1, 'C');
						//$pdf->Cell(25, 5,'', 1,0, 'C');
						//$pdf->Cell(25, 5,'', 1,1, 'C');
						
						
					}




$pdf->Ln(10);
	
	                    
						$pdf->SetFillColor(150,50,150);
                        $pdf->SetDrawColor(0,0,0);
                        $pdf->SetTextColor(0,0,0);
						$pdf->SetFontSize(10);
						
						
						$pdf->Cell(85, 5,'TITULO', 1,0, 'C');
					
					
						$pdf->Cell(25, 5,'CANTIDAD', 1,0, 'C');
						
						$pdf->Cell(25, 5,'PRECIO', 1,0, 'C');
						$pdf->Cell(25, 5,'TOTAL', 1,1, 'C');
						//$pdf->Cell(25, 5,'', 1,0, 'C');
						//$pdf->Cell(25, 5,'', 1,1, 'C');
						
						
	$tra= new ordcomp_cabecera();
$reg=$tra->get_ordcomp_detalle_pdf(($_GET['cod_emp']),($_GET['cod_suc']),($_GET['var_comp']));
					$total=0;
					for ($i=0;$i<count($reg);$i++)
					{
						
						
						$total+=$reg[$i]["total"];
						
						
						
						
						$pdf->SetTextColor(0,0,0);
								$pdf->SetFontSize(8);
						$pdf->Cell(85, 5,$reg[$i]["var_nom_tit"], 1,0, 'C');
						
						$pdf->Cell(25, 5,$reg[$i]["int_cant_comp_det"], 1,0, 'C');
					
						$pdf->Cell(25, 5,$reg[$i]["dec_val_comp_det"], 1,0, 'C');
						$pdf->Cell(25, 5,$reg[$i]["total"], 1,1, 'C');
						//$pdf->Cell(25, 5,'', 1,0, 'C');
						//$pdf->Cell(25, 5,'', 1,1, 'C');
						
						
					}


$pdf->SetFillColor(150,50,150);
                        $pdf->SetDrawColor(0,0,0);
                        $pdf->SetTextColor(0,0,0);
						$pdf->SetFontSize(10);
						
						
						$pdf->Cell(110, 5,'', 1,0, 'C');
					
					
			
						
						$pdf->Cell(25, 5,'Total:', 1,0, 'C');
						$pdf->Cell(25, 5,$total, 1,1, 'C');



     
	 

$pdf->Output();
?>




				
				
						
						
						
					

