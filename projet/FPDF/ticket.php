
<?php

//connection au base de donnee
try
{
    // On se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=drae_agri', 'root', '');
}
catch(Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}


//recuperation de l'id selectionner
if (isset($_GET['idpaysant'])) {
    $idpaysant = $_GET['idpaysant'];
}

$identite = $bdd->query("SELECT * FROM demander  JOIN repondre on demander.ID_PAYSANT=repondre.ID_PAYSANT JOIN paysant on
repondre.ID_PAYSANT=paysant.ID_PAYSANT" );
$stage = $identite->fetch();
$ID_PAYSANT = ($stage['ID_PAYSANT']);
$CIN_PAYSANT = ($stage['CIN_PAYSANT']);
$NOM_EAF = ($stage['NOM_EAF']);
$NOM_ASSOC = ($stage['NOM_ASSOC']);

$ETAT = ($stage['ETAT']);
$DATE_FORMATION = ($stage['DATE_FORMATION']);
$DATE_RECEP_MATERIEL = ($stage['DATE_RECEP_MATERIEL']);
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

// n� facture, date echeance et reglement et obs

//
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
$pdf->Write($h, $retrait .  " REPONSE ");

$pdf->Write($h, $retrait. "\n" ."\n" );
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "ID DU PAYSANT : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', '');
$pdf->Write($h, $ID_PAYSANT . "\n");
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "NUMERO CIN : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'B');
$pdf->Write($h, $CIN_PAYSANT . "\n");

$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "NOM DU PAYSANT : ".$NOM_EAF . "\n" );

//Ecriture normal
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .   "NOM ASSOCIATION : ");
$pdf->SetFont('', '');
$pdf->Write($h, $NOM_ASSOC . "  ". "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .   "ETAT DE LA DEMANDE : ");
$pdf->SetFont('', '');
$pdf->Write($h, $ETAT . "  ". "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "DATE DE FORMATION : ");
$pdf->SetFont('', '');
$pdf->Write($h, $DATE_FORMATION. "  " . "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "DATE DE RECEPTION MATERIEL : ");
$pdf->SetFont('', '');
$pdf->Write($h, $DATE_RECEP_MATERIEL. "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "TYPE D'APPUI : ");
$pdf->SetFont('', '');
$pdf->Write($h, $TYPE_APPUI. "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "MATERIEL VALIDE : ");
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
