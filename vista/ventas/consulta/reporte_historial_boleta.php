
<?php
//print_r($_GET);

require_once("../../../conexiones/class_historico_ventas_pdf.php");
require("fpdf/fpdf.php");






$dssss;
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


$tra=new factura_cabecera();

$reg=$tra->get_factura_cabecera(trim($_GET['cod_cab']),trim($_GET['cod_ser']),trim($_GET['cod_suc']),trim($_GET['cod_emp']),trim($_GET['tipo_doc']));


	


$html = 'prueba';

$pdf = new PDF();
// Primera página
$pdf->AddPage();
$pdf->SetFont('Arial','',8);

$link = $pdf->AddLink();



    // Logo
    
    // Arial bold 15
    $pdf->SetFont('Arial','',10);
	$pdf->SetMargins(10,20,20);
    // Movernos a la derecha
    $pdf->Cell(140);
    // Título
   // $this->Cell(50,10,'R.U.C. Nº 20100488699',1,0,'C');
	$pdf->Cell(50,10, iconv('UTF-8', 'ISO-8859-2', '     R.U.C. N° 20100488699'),1);
	//$pdf->Image('img/chart.png',30,10,20,20,'PNG');
	
	$pdf->Ln();
	$pdf->Cell(140);
	$pdf->Cell(50,18,$reg[0]["int_tip_doc_fact"],1,0,'C');
	//$this->Image('logo.jpg' , 80 ,22, 35 , 38,'JPG', 'http://www.desarrolloweb.com');
  
    // Salto de línea
    $pdf->Ln(20);










/**********                 **********/	
	
	$pdf->SetXY(165, 30);
	$pdf->Cell(10, 8,	$reg[0]["serie"], 0, 'C');




	$pdf->SetXY(5, 40);
	$pdf->Cell(10, 8, 'Nombre: ', 0, 'C');
	$pdf->SetFontSize(9);
	$pdf->SetXY(30, 40);
	$pdf->Cell(10, 8,	$reg[0]["var_rsoc_cli"], 0, 'C');
	
	
	
	
	
	$pdf->SetFontSize(10);
	$pdf->SetXY(5, 47);
	$pdf->Cell(10, 8, utf8_decode('DIRECCION:'), 0, 'C');
	$pdf->SetFontSize(9);
	$pdf->SetXY(30, 47);
	$pdf->Cell(10, 8,$reg[0]["var_ruc_cli"], 0, 'C');
	

	
	
/**********                 **********/	
/**********                 **********/	
	$pdf->SetXY(140, 40);
	$pdf->Cell(10, 8, 'LIMA, ', 0, 'C');
	
	$pdf->SetFontSize(9);
	$pdf->SetXY(150, 40);
	$pdf->Cell(10, 8,$reg[0]["dia"], 0, 'C');
	
	

		$pdf->SetXY(155, 40);
	$pdf->Cell(10, 8, 'de ', 0, 'C');
	
	$pdf->SetFontSize(9);
	$pdf->SetXY(160, 40);
	$pdf->Cell(10, 8,$reg[0]["mes"], 0, 'C');
	
	
	$pdf->SetXY(180, 40);
	$pdf->Cell(10, 8, 'del ', 0, 'C');
	
	$pdf->SetFontSize(9);
	$pdf->SetXY(185, 40);
	$pdf->Cell(10, 8,$reg[0]["anio"], 0, 'C');
	
	


	
	
	
/**********                 **********/	

/**********                 **********/	
	
	
	
/**********                 **********/	

/**********                 **********/	
	

	
/**********                 **********/	


/**********                 **********/	
	/*$pdf->SetXY(5, 67);
	$pdf->Cell(10, 8, 'Centro de Trabajo:', 0, 'C');
	$pdf->SetFontSize(9);
	$pdf->SetXY(170, 60);
	$pdf->Cell(10, 8,$reg[0]["var_telf_guia_cab"], 0, 'C');	*/

	
	
	
/**********                 **********/

/**********                 **********/	
	





$pdf->Ln(15);
	
	                    
						$pdf->SetFillColor(150,50,150);
                        $pdf->SetDrawColor(0,0,0);
                        $pdf->SetTextColor(0,0,0);
						$pdf->SetFontSize(10);
						
						
						$pdf->Cell(25, 5,'CANTIDAD', 1,0, 'C');
					
					
						$pdf->Cell(95, 5,'DESCRIPCION', 1,0, 'C');
						
						$pdf->Cell(35, 5,'P. UNITARIO', 1,0, 'C');
						$pdf->Cell(35, 5,'Valor de Venta', 1,1, 'C');
						
						
	
$tra= new factura_cabecera();
					$reg=$tra->get_factura_det(trim($_GET['cod_cab']),trim($_GET['cod_ser']),trim($_GET['cod_suc']),trim($_GET['cod_emp']),trim($_GET['tipo_doc']));
					$suma=0;
					for ($i=0;$i<count($reg);$i++)
					{
						$total=$reg[$i]["precio"] * $reg[$i]["int_cant_fact_det"];	
						$pdf->SetTextColor(0,0,0);
						$pdf->SetFontSize(8);						
						$pdf->Cell(25, 5,$reg[$i]["int_cant_fact_det"], 1,0, 'C');					
						$pdf->Cell(95, 5,$reg[$i]["var_nom_tit"], 1,0, 'C');					
						$pdf->Cell(35, 5,$reg[$i]["precio"], 1,0, 'C');
						$pdf->Cell(35, 5,$total, 1,1, 'C');
						$suma=$suma+ $total;
					}


     


	$pdf->SetXY(160, 100);
	$pdf->Cell(10, 8, 'TOTAL: ', 0, 'C');
	/*$suma=0;
	for ($i = 0; $i <count($reg); $i++) {
    	$suma=$suma+ ($reg[$i]["precio"] * $reg[$i]["int_cant_fact_det"]);
			
	}*/
		$pdf->SetFontSize(9);
		$pdf->SetXY(180, 100);
		$pdf->Cell(10, 8,$suma, 0, 'C');
			 

$pdf->Output();
?>
