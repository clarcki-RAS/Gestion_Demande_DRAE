
<?php
//connection au base de donnee
require '../tables/conn.php';


//recuperation de l'id selectionner
if (isset($_GET['idvoit'])) {
    $idvoit = $_GET['idvoit'];
}

$identite = $conn->query("SELECT * FROM JOINTURE where idvoit='$idvoit'" );
$stage = $identite->fetch();
$nom_prenom = ($stage['date_envoi']);
$nom_prenom1 = ($stage['nomenvoyeur']);
$nom_prenom2 = ($stage['idvoit']);
$date_naiss = ($stage['villedep']);

$lieu_naiss = ($stage['villearr']);
$date_naiss3 = ($stage['colis']);
$date_naiss4 = ($stage['frais']);
$date_naiss5 = ($stage['nomrecepteur']);
$cin = ($stage['contactrecepteur']);



require('../FPDF/fpdf.php');

$pdf = new FPDF('P', 'mm', 'A5');

//Ajouter une nouvelle page
$pdf->AddPage();

// entete::$pdf->Image('en-tete.png', 10, 5, 130, 20);

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

// Début en police Arial normale taille 10
/*$pdf->SetLineWidth(0.1);
$pdf->Rect(5, 60, 138, 0.1, "D");*/



$h = 7;
$retrait = "      ";
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "Date d'envoi : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', '');
$pdf->Write($h, $nom_prenom . "\n");
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "Nom de l'Envoyeur : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'B');
$pdf->Write($h, $nom_prenom1 . "\n");

$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "Voiture N° : ".$nom_prenom2 ." / "."Destination = ". $date_naiss . " - ".$lieu_naiss."\n");

//Ecriture en Gras-Italique-Souligné(U)
/*$pdf->SetFont('', 'B');
$pdf->Write($h, $nom_prenom2 . "\n");*/

//Ecriture normal
$pdf->SetFont('Arial', 'B', 10);

/*$pdf->Write($h, $retrait . "villedep : ");
$pdf->SetFont('', '');
$pdf->Write($h, $date_naiss . "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait . "villearr : ");
$pdf->SetFont('', '');
$pdf->Write($h, $lieu_naiss . "  " . "Litres" . "\n");
$pdf->SetFont('Arial', 'B', 10);*/

$pdf->Write($h, $retrait . "Colis: ");
$pdf->SetFont('', '');
$pdf->Write($h, $date_naiss3 . "  " ." \n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .   "Frais : ");
$pdf->SetFont('', '');
$pdf->Write($h, $date_naiss4 . "  "." Ar". "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "Nom du Recepteur: ");
$pdf->SetFont('', '');
$pdf->Write($h, $date_naiss5. "  " . "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "Contact du Recepteur: ");
$pdf->SetFont('', '');
$pdf->Write($h, $cin. "\n");
$pdf->SetFont('Arial', 'B', 10);


// $pdf->Write($h, $retrait . "Filière :  " . $filiere . " \n");

// $pdf->Write($h, $retrait . "Niveau de formation :  " . $niveau . "  \n");

// $pdf->Write($h, $retrait . "Classe :  " . $classe . " \n");

// $pdf->Write($h, $retrait . "Année de formation :  " . $as . "  \n");

// $pdf->Write($h, "Poursuit ses étude en  " . $classe . "   et cela pour l'année scolaire en cours  " . $as . "  \n");

// $pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");

//Afficher le pdf
/*$pdf->SetLineWidth(0.1);
$pdf->Rect(5, 165, 138, 0.1, "D");
$pdf->SetLineWidth(0.1);
$pdf->Rect(5, 169, 138, 6, "D");
$pdf->SetXY(1, 169);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell($pdf->GetPageWidth(), 7, "Commune Urbaine Ambalavao,Copyright 2022,GESTO", 0, 0, 'C');*/


$pdf->Output();

?>
