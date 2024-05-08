<?php

//
// exemple de facture avec mysqli
// gere le multi-page
// Ver 1.0 THONGSOUME Jean-Paul
//

require 'fpdf.php';

// le mettre au debut car plante si on declare $mysqli avant !
$pdf = new FPDF('P', 'mm', 'A4');

// on declare $mysqli apres !
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'gest_eau';
$mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error); // FORCE UTF-8
//mysqli_query($mysqli, "SET NAMES UTF8");

$var_id_facture = $_GET['id_ajout'];

// on sup les 2 cm en bas
$pdf->SetAutoPagebreak(false);
$pdf->SetMargins(0, 0, 0);

// nb de page pour le multi-page : 18 lignes

$nb_page = 1;

$num_page = 1;
$limit_inf = 0;
$limit_sup = 18;
while ($num_page <= $nb_page) {
    $pdf->AddPage();

    // logo : 80 de largeur et 55 de hauteur
    $pdf->Image('../vendors/images/logo.png', 10, 10, 80, 55);

    // n� page en haute � droite
    $pdf->SetXY(120, 5);
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(160, 8, $num_page . '/' . $nb_page, 0, 0, 'C');

    // n� facture, date echeance et reglement et obs
    $select = "SELECT * FROM ajout where 'id_ajout'= . $var_id_facture";
    $result = mysqli_query($mysqli, $select) or die('Erreur SQL : ' . $select . mysqli_connect_error());
    $row = mysqli_fetch_row($result);
    mysqli_free_result($result);

    $champ_date = date_create($row[0]);
    $annee = date_format($champ_date, 'Y');
    $num_fact = "FACTURE N� " . $annee . '-' . str_pad($row[1], 4, '0', STR_PAD_LEFT);
    $pdf->SetLineWidth(0.1);
    $pdf->SetFillColor(192);
    $pdf->Rect(120, 15, 85, 8, "DF");
    $pdf->SetXY(120, 15);
    $pdf->SetFont("Arial", "B", 12);
    $pdf->Cell(85, 8, $num_fact, 0, 0, 'C');

    // nom du fichier final
    $nom_file = "fact_" . $annee . '-' . str_pad($row[1], 4, '0', STR_PAD_LEFT) . ".pdf";

    // date facture
    $champ_date = date_create($row[0]);
    $date_fact = date_format($champ_date, 'd/m/Y');
    $pdf->SetFont('Arial', '', 11);
    $pdf->SetXY(122, 30);
    $pdf->Cell(60, 8, "Ambalavao, le " . $date_fact, 0, 0, '');

    // si derniere page alors afficher total

    // observations

    // ***********************
    // le cadre des articles
    // ***********************
    // cadre avec 18 lignes max ! et 118 de hauteur --> 95 + 118 = 213 pour les traits verticaux
    $pdf->SetLineWidth(0.1);
    $pdf->Rect(5, 95, 200, 118, "D");
    // cadre titre des colonnes
    $pdf->Line(5, 105, 205, 105);
    // les traits verticaux colonnes
    $pdf->Line(145, 95, 145, 213);
    $pdf->Line(158, 95, 158, 213);
    $pdf->Line(176, 95, 176, 213);
    $pdf->Line(187, 95, 187, 213);
    // titre colonne
    $pdf->SetXY(1, 96);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(140, 8, "Numero bornes", 0, 0, 'C');
    $pdf->SetXY(1, 101);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(13, 8, "numero du responsables", 0, 0, 'C');
    $pdf->SetXY(1, 106);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(22, 8, "Ancien Index", 0, 0, 'C');
    $pdf->SetXY(1, 111);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(10, 8, "Nouvel Index", 0, 0, 'C');
    $pdf->SetXY(1, 116);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(22, 8, "Date du dernier ajout", 0, 0, 'C');
    $pdf->SetXY(1, 121);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(22, 8, "Date d'ajout", 0, 0, 'C');
    $pdf->SetXY(1, 126);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(22, 8, "Montant par raptort a l'index", 0, 0, 'C');
    $pdf->SetXY(1, 131);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(22, 8, "montant", 0, 0, 'C');
    $pdf->SetXY(1, 136);
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->Cell(22, 8, "Nombres de personnes", 0, 0, 'C');

    // les articles
    $pdf->SetFont('Arial', '', 8);
    $y = 97;
    $a = 97;
    // 1ere page = LIMIT 0,18 ;  2eme page = LIMIT 18,36 etc...
    $sql = 'select libelle,qte,pu,taux_tva FROM ligne_facture where id_ajout=' . $var_id_facture . ' order by libelle';
    $sql .= ' LIMIT ' . $limit_inf . ',' . $limit_sup;
    $res = mysqli_query($mysqli, $sql) or die('Erreur SQL : ' . $sql . mysqli_connect_error());
    while ($data = mysqli_fetch_assoc($res)) {
        // libelle
        $pdf->SetXY($y + 9, 7);
        $pdf->Cell(140, 5, $data['id_comptera'], 0, 0, 'L');
        // qte
        $pdf->SetXY($y + 9, 145);
        $pdf->Cell(13, 5, strrev(wordwrap(strrev($data['id_fonc']), 3, ' ', true)), 0, 0, 'R');
        // PU

        $pdf->SetXY($y + 9, 158);
        $pdf->Cell(18, 5, $data['ancien_index'], 0, 0, 'R');
        // Taux

        $pdf->SetXY($y + 9, 177);
        $pdf->Cell(10, 5, $data['nouvel_index'], 0, 0, 'R');
        // total

        $pdf->SetXY($y + 9, 187);
        $pdf->Cell(18, 5, $data['ancien_date'], 0, 0, 'R');
        $pdf->SetXY($y + 9, 187);
        $pdf->Cell(18, 5, $data['nouvel_date'], 0, 0, 'R');
        $pdf->SetXY($y + 9, 187);
        $pdf->Cell(18, 5, $data['montant_payer'], 0, 0, 'R');
        $pdf->SetXY($y + 9, 187);
        $pdf->Cell(18, 5, $data['montant'], 0, 0, 'R');
        $pdf->SetXY($y + 9, 187);
        $pdf->Cell(18, 5, $data['personnes'], 0, 0, 'R');

        $pdf->Line(5, $y + 14, 205, $y + 14);

        $y += 6;
    }
    mysqli_free_result($res);

    // si derniere page alors afficher cadre des TVA

    // par page de 18 lignes
    $num_page++;
    $limit_inf += 18;
    $limit_sup += 18;
}

$pdf->Output("I", $nom_file);
