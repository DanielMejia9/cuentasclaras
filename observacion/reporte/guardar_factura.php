<?php
require('../libreria/fpdf.php');
$numero_factura = $_POST["numero_factura"];
$rifEmp         = $_POST["rifEmp"];
$datepicker     = $_POST["datepicker"];
$nom_cliente    = $_POST["sele_clie"];
$dir_cliente    = $_POST["dirEmp"];
$telefono1      = $_POST["telEmpr"];
$telefono2      = $_POST["telEmpropc"];

if($telefono2 == 'NA' || $telefono2 =='')
{
    $telefono2 == NULL;  
}

//Se declara la clases
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('img_logo.png',10,8,190);
    // Arial bold 15
    $this->SetFont('Arial','',10);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    //$this->Cell(30,10,'Title',1,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    //$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();

$pdf->AddPage();
$pdf->SetFont('Arial','',10);

$pdf->Cell(180,30,'' ,0,1,'C');
$pdf->Cell(180,5,'Factura: '.$numero_factura ,0,1,'C');

$pdf->Cell(50,5,'C.I o R.I.F: '.$rifEmp);
$pdf->Cell(250,5,'Fecha: '.$datepicker ,0,1,'C');
$pdf->Cell(10,5,'Cliente: '.$nom_cliente);
$pdf->Cell(315,5,'Condicion de Pago: Contado ' ,0,1,'C');
$pdf->Cell(50,5,'Direccion: '.$dir_cliente ,0,1,'');
$pdf->Cell(50,5,'Telefonos: '.$telefono1 );
$pdf->Cell(50,5,''.$telefono2 );
$pdf->Output();



$pdf->close();
?>
