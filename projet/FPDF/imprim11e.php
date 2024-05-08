
<?Php
require '../tables/conn.php';//connection to database
//SQL to get 10 records
$sql = "select * from jointure";
require('../FPDF/fpdf.php');
$pdf = new FPDF();
$pdf->AddPage();

$width_cell = array(29, 29, 22, 40, 80);
$pdf->SetFont('Arial', 'B', 16);

//Background color of header//
$pdf->SetFillColor(193, 229, 252);

global $pdf;

$pdf->SetFont("times", "B", 10);

$pdf->setX(70);
$pdf->Cell(40, 6, "REPOBLIKAN'I MADAGASIKARA");
$pdf->Ln();
$pdf->setX(70);
$pdf->Cell(40, 6, "Fitiavana-Tanindrazana-Fandrosoana");
$pdf->Ln();
$pdf->Ln();
$pdf->SetFont("times", "b", 10);
$pdf->setX(70);
$pdf->Cell(40, 6, "COMMUNE URBAINE AMBALAVAO");
$pdf->Ln();
$pdf->SetFont("times", "b", 10);
$pdf->setX(60);
$pdf->Cell(40, 6, "GEOLOCALISATION DES BORNES FONTAINES");
$pdf->Ln();

$pdf->SetFont("times", "B", 10);
$pdf->setX(90);

function saut($nbr)
{
    global $pdf;
    for ($i = 0; $i < $nbr; $i++) {
        $pdf->Ln();
    }
}
saut(2);
// Header starts ///
//First header column //
$pdf->Cell($width_cell[0], 10, 'Numero Compteur', 1, 0, 'C', true);
//Second header column//
$pdf->Cell($width_cell[1], 10, 'Installation', 1, 0, 'C', true);
//Third header column//
$pdf->Cell($width_cell[2], 10, 'Code Quartier', 1, 0, 'C', true);
//Fourth header column//
$pdf->Cell($width_cell[3], 10, 'Quartier', 1, 0, 'C', true);
//Third header column//
$pdf->Cell($width_cell[4], 10, 'Localisation', 1, 1, 'C', true);

//// header ends ///////

$pdf->SetFont('Arial', '', 9);
//Background color of header//
$pdf->SetFillColor(235, 236, 236);
//to give alternate background fill color to rows//
$fill = false;

/// each record is one row  ///
foreach ($conn->query($sql) as $row) {
    $pdf->Cell($width_cell[0], 10, $row['date_envoi'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[1], 10, $row['nomenvoyeur'], 1, 0, 'L', $fill);
    $pdf->Cell($width_cell[2], 10, $row['idvoit'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[3], 10, $row['villedep'], 1, 0, 'C', $fill);
    $pdf->Cell($width_cell[4], 10, $row['villearr'], 1, 1, 'C', $fill);
//to give alternate background fill  color to rows//
    $fill = !$fill;
}
/// end of records ///

$nom_file = "geoloc.pdf";
$pdf->Output('', $nom_file, true);
