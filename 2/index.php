<?php
require('fpdf/fpdf.php');
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
 
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(75,10,'Reporte de Estudiantes',1,0,'C');
    // Salto de línea
    $this->Ln(20);
    $this->Cell(40,10,'Cedula',1,0,'C',0);
    $this->Cell(40,10, 'Nombre',1,0,'C',0);
    $this->Cell(40,10, 'Apellido',1,0,'C',0);
    $this->Cell(40,10, 'Curso',1,1,'C',0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
}
}

require'conec.php';
$consulta = "SELECT * FROM estudiantes WHERE CUR_EST = 1";
$resultado = $mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',16);

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(40,10,$row['CED_EST'],1,0,'C',0);
    $pdf->Cell(40,10,$row['NOM_EST'],1,0,'C',0);
    $pdf->Cell(40,10,$row['APE_EST'],1,0,'C',0);
    $pdf->Cell(40,10,$row['CUR_EST'],1,1,'C',0);
}

$pdf->Output('D');
?>