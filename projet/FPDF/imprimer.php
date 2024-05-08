
<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=drae_agri', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}


//recuperation de l'id selectionner
if (isset($_GET['idpaysant'])) {
    $idpaysant = $_GET['idpaysant'];
}

$identite = $bdd->query("SELECT * FROM demander INNER JOIN paysant on demander.ID_PAYSANT=paysant.ID_PAYSANT" );
$stage = $identite->fetch();
$ID_RESPONSABLE = ($stage['ID_RESPONSABLE']);
$ID_PAYSANT = ($stage['ID_PAYSANT']);
$NOM_EAF = ($stage['NOM_EAF']);
$NOM_ASSOC = ($stage['NOM_ASSOC']);

$DATE_ENVOIE = ($stage['DATE_ENVOIE']);
$DATE_REP = ($stage['DATE_REP']);
$FILIERE = ($stage['FILIERE']);
$TYPE_APPUI = ($stage['TYPE_APPUI']);
$MATERIEL = ($stage['MATERIEL']);



require('../FPDF/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
$pdf->AddPage();

$pdf->Image('drae.jpg', 10, 5, 30, 25);

// Saut de ligne
$pdf->Ln(18);

// Police Arial gras 16
$pdf->SetFont('Arial', 'B', 16);

// Titre


// n� page en haute � droite
$pdf->SetXY(50, 5);
$pdf->SetFont("Arial", "", 10);
$pdf->Cell(160, 8, '1' . '/' . '1', 0, 0, 'C');
// Saut de ligne
$pdf->Ln();

function saut($nbr)
{
    global $pdf;
    for ($i = 0; $i < $nbr; $i++) {
        $pdf->Ln();
    }
}
saut(2);


$h = 7;
$retrait = "      ";

$pdf->Write($h, $retrait. "\n" ."\n" );
$pdf->Write($h, $retrait, $retrait);
$pdf->Write($h, $retrait .  " DEMANDE ");

$pdf->Write($h, $retrait. "\n" ."\n" );
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "ID RESPONSABLE : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', '');
$pdf->Write($h, $ID_RESPONSABLE . "\n");
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "ID DU PAYSANT : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'B');
$pdf->Write($h, $ID_PAYSANT . "\n");

$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "NOM DU PAYSANT : ".$NOM_EAF . "\n" );


$pdf->SetFont('Arial', 'B', 10);


$pdf->Write($h, $retrait .   "NOM ASSOCIATION : ");
$pdf->SetFont('', '');
$pdf->Write($h, $NOM_ASSOC . "  ". "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .   "DATE D'ENVOIE DU DEMANDE : ");
$pdf->SetFont('', '');
$pdf->Write($h, $DATE_ENVOIE . "  ". "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "DATE DE RECEPTION D'UNE REPONSE : ");
$pdf->SetFont('', '');
$pdf->Write($h, $DATE_REP. "  " . "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "FILLIERE D'ACTIVITE: ");
$pdf->SetFont('', '');
$pdf->Write($h, $FILIERE. "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "TYPE D'APPUI : ");
$pdf->SetFont('', '');
$pdf->Write($h, $TYPE_APPUI. "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "MATERIEL DEMANDES: ");
$pdf->SetFont('', '');
$pdf->Write($h, $MATERIEL. "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait. "\n" ."\n" ."\n"."\n"."\t");
$pdf->Write($h, $retrait .  "signature du responsabble ");
$pdf->Write($h, $retrait. "\t" ."\t" ."\t"."\t"."\t"."\t" ."\t" ."\t"."\t"."\t");
$pdf->Write($h, $retrait .  "signature du citoyen ");
$pdf->SetFont('', '');
$pdf->SetFont('Arial', 'B', 10);


$pdf->Output();

?>
