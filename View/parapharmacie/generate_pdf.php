<?php

require '../../vendor/autoload.php';
include "../../Controller/parapharmacie/produitc.php";

$produit = new produitc();

$pdf = new TCPDF();

$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('list Produit');

$pdf->AddPage();

// Définir la police et la taille de police
$pdf->SetFont('helvetica', '', 20);

// Ajouter un espace pour le titre
$pdf->Cell(0, 10, '', 0, 1); 

// Ajouter le titre au milieu
$pdf->Cell(0, 10, 'Products List', 0, 1, 'C');

// Définir les marges
$pdf->SetMargins(10, 10, 10);

// Définir les colonnes avec une largeur plus grande
$idWidth = 40; // Ajusted width
$cinWidth =60; // Ajusted width
$nomWidth = 10; // Ajusted width
$genreWidth = 60; // Ajusted width

// En-tête
$pdf->SetFillColor(46, 204, 113); // Nouvelle couleur de fond (vert)
$pdf->SetTextColor(255, 255, 255); // Couleur du texte
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell($idWidth, 12, 'Code-Product', 1, 0, 'C', true);
$pdf->Cell($cinWidth, 12, 'wording', 1, 0, 'C', true);
$pdf->Cell($nomWidth, 12, 'Price', 1, 0, 'C', true);
$pdf->Cell($genreWidth, 12, 'Description', 1, 1, 'C', true);

// Données
$pdf->SetTextColor(0, 0, 0); // Couleur du texte
$pdf->SetFont('helvetica', '', 12);
$fill = false; // Alternance de couleur de fond
foreach ($produit->listproduit() as $staffMember) {
    $pdf->Cell($idWidth, 8, $staffMember['code_produit'], 1, 0, 'C', $fill);
    $pdf->Cell($cinWidth, 8, $staffMember['libelle'], 1, 0, 'C', $fill);
    $pdf->Cell($nomWidth, 8, $staffMember['prix'], 1, 0, 'C', $fill);

    // Ajout de l'image
    // Sauvegardez les coordonnées actuelles
    $x = $pdf->GetX();
    $y = $pdf->GetY();
    // Spécifiez les dimensions de l'image dans le PDF

    // Ajoutez l'image avec une marge de 2 points et les dimensions spécifiées

    // Dessinez une ligne de séparation

    // Restaurez les coordonnées
    $pdf->Cell($genreWidth, 8, $staffMember['description'], 1, 1, 'C', $fill);
}

$pdf->Output('staff_information.pdf', 'I');
?>
