<?php

"SET NAMES UTF8";

require '../tables/conn.php';

if (isset($_GET['idvoit'])) {
    $ids = $_GET['idvoit'];
}
if (isset($_GET['as'])) {
    $as = $_GET['as'];}
$identite = $conn->query("SELECT * FROM JOINTURE");
$stage = $identite->fetch();

$nom_prenom = strtoupper($stage['date_envoi']);
$nom_prenom1 = strtoupper($stage['nomenvoyeur']);
$nom_prenom2 = ($stage['idvoit']);

$date_naiss = ($stage['villedep']);

$lieu_naiss = strtoupper($stage['villearr']);
$date_naiss3 = ($stage['colis']);
$date_naiss4 = ($stage['frais']);
$date_naiss5 = ($stage['nomrecepteur']);
$cin = ($stage['contactrecept']);

function dateEnToDateFr($dateEn)
{
    //$dateEn='2019-02-26';
    return substr($dateEn, 8, 2) . "/" . substr($dateEn, 5, 2) . "/" . substr($dateEn, 0, 4);
    // Result: '26/02/2019'
}
function formatMoney($number, $fractional = false)
{
    if ($fractional) {
        $number = sprintf('%.2f', $number);
    }
    while (true) {
        $replaced = preg_replace('/(-?\d+)(\d\d\d)/', '$1 $2', $number);
        if ($replaced != $number) {
            $number = $replaced;
        } else {
            break;
        }
    }
    return $number;
}
// $scolarite_stagiaire = $pdo->query("SELECT *
//                                         FROM ajout
//                                         WHERE  id_ajout='$ids'");
// $scolarite = $scolarite_stagiaire->fetch();

// $filiere = strtoupper($scolarite['Nom_Filiere']);

// $niveau = strtoupper($scolarite['niveau_diplome']);

// $classe = strtoupper($scolarite['classe']);

require 'fpdf.php';

//Création d'un nouveau doc pdf (Portrait, en mm , taille A5)
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
foreach ($conn->query("SELECT * FROM JOINTURE WHERE idvoit=$ids") as $fetch) {

    $champ_date = date_create($fetch['nouvel_date']);
    $annee = date_format($champ_date, 'Y');
    $num_fact = "AJOUT N: " . $annee . '-' . str_pad($fetch['id_ajout'], 4, '0', STR_PAD_LEFT);
    $pdf->SetLineWidth(0.1);
    $pdf->SetFillColor(192);
    $pdf->Rect(50, 15, 85, 8, "DF");
    $pdf->SetXY(50, 15);
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(85, 8, $num_fact, 0, 0, 'C');

// nom du fichier final
    $nom_file = "fact_" . date('d/m/Y') . '-' . str_pad($fetch['id_ajout'], 4, '0', STR_PAD_LEFT) . ".pdf";

// date facture
    // $champ_date = date_create($fetch['ancien_index']);
    // $date_fact = date_format($champ_date, 'd/m/Y');
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetXY(50, 30);
    $pdf->Cell(60, 8, "Ambalavao, le " . date('d/m/Y'), 0, 0, '');

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(60, 36);
    $pdf->Cell(45, 8, "COMMUNE URBAINE D'AMBALAVAO ", 0, 0, 'C');
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->SetXY(60, 42);
    $pdf->Cell(45, 8, " GESTION DE BORNES FONTAINES ", 0, 0, 'C');

    $pdf->Ln();
}
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
$pdf->SetLineWidth(0.1);
$pdf->Rect(5, 60, 138, 0.1, "D");

$h = 7;
$retrait = "      ";
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "Numero compteur : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', '');
$pdf->Write($h, $nom_prenom . "\n");
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "Nom du Responsable : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'B');
$pdf->Write($h, $nom_prenom1 . "\n");
$pdf->SetFont('Arial', 'B', 10);
$pdf->Write($h, $retrait . "Prenom du Responsable : ");

//Ecriture en Gras-Italique-Souligné(U)
$pdf->SetFont('', 'B');
$pdf->Write($h, $nom_prenom2 . "\n");

//Ecriture normal
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait . "Numero du Responsable : ");
$pdf->SetFont('', '');
$pdf->Write($h, $date_naiss . "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait . "Ancien Index : ");
$pdf->SetFont('', '');
$pdf->Write($h, $lieu_naiss . "  " . "Litres" . "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait . "Nouvel Index : ");
$pdf->SetFont('', '');
$pdf->Write($h, $cin . "  " . "Litres" . " \n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .   "Consommation : ");
$pdf->SetFont('', '');
$pdf->Write($h, $date_naiss3 . "  "."Litres". "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "Estimation: ");
$pdf->SetFont('', '');
$pdf->Write($h, $date_naiss4 . "  " ."bidons".  "\n");
$pdf->SetFont('Arial', 'B', 10);

$pdf->Write($h, $retrait .  "Statut: ");
$pdf->SetFont('', '');
$pdf->Write($h, $date_naiss5 . "\n");
$pdf->SetFont('Arial', 'B', 10);



// $pdf->Write($h, $retrait . "Filière :  " . $filiere . " \n");

// $pdf->Write($h, $retrait . "Niveau de formation :  " . $niveau . "  \n");

// $pdf->Write($h, $retrait . "Classe :  " . $classe . " \n");

// $pdf->Write($h, $retrait . "Année de formation :  " . $as . "  \n");

// $pdf->Write($h, "Poursuit ses étude en  " . $classe . "   et cela pour l'année scolaire en cours  " . $as . "  \n");

// $pdf->Write($h, "La présente attestation est délivrée à l'intéressé Pour servir et valoir ce que de droit. \n");

//Afficher le pdf
$pdf->SetLineWidth(0.1);
$pdf->Rect(5, 165, 138, 0.1, "D");
$pdf->SetLineWidth(0.1);
$pdf->Rect(5, 169, 138, 6, "D");
$pdf->SetXY(1, 169);
$pdf->SetFont('Arial', 'B', 7);
$pdf->Cell($pdf->GetPageWidth(), 7, "Commune Urbaine Ambalavao,Copyright 2022,GESTO", 0, 0, 'C');

$nom_file = "fact_" . $annee . '-' . str_pad($fetch['id_ajout'], 4, '0', STR_PAD_LEFT) . ".pdf";
$pdf->Output('', $nom_file, true);
