<?php

require '../../vendor/autoload.php';
include "../../Controller/rendez-vousC.php";

$rendezvousC = new rendezvousC();
$rendezvousList = $rendezvousC->listrendez_vous(); // Récupérer la liste des rendez-vous

$pdf = new TCPDF();

$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Staff Information List');

$pdf->AddPage();

// Définir la police et la taille de police
$pdf->SetFont('helvetica', '', 20);

// Définir les marges
$pdf->SetMargins(10, 10, 10);

// Définir les colonnes avec une largeur appropriée
$idWidth = 30;
$cinWidth = 60;
$nomWidth = 60;
$prenomWidth = 60;
$heureWidth = 30; // Ajuster la largeur pour l'heure

// En-tête
$pdf->SetFillColor(44, 62, 80); // Couleur de fond
$pdf->SetTextColor(255, 255, 255); // Couleur du texte
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell($idWidth, 15, 'Staff List', 1, 1, 'C', true);

$pdf->SetFillColor(52, 73, 94); // Couleur de fond de l'en-tête
$pdf->SetTextColor(255, 255, 255); // Couleur du texte
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell($idWidth, 12, 'Specialité', 1, 0, 'C', true);
$pdf->Cell($cinWidth, 12, 'Nom du médecin', 1, 0, 'C', true);
$pdf->Cell($nomWidth, 12, 'Date du rendez-vous', 1, 0, 'C', true);
$pdf->Cell($heureWidth, 12, 'Heure', 1, 1, 'C', true);

// Titre
$pdf->SetFont('helvetica', 'B', 20);

// Données
$pdf->SetFont('helvetica', '', 12);
$fill = false; // Alternance de couleur de fond
foreach ($rendezvousList as $rendezvous) {
    $pdf->Cell($idWidth, 8, $rendezvous['specialite'], 1, 0, 'C', $fill);
    $pdf->Cell($cinWidth, 8, $rendezvous['nommedecin'], 1, 0, 'C', $fill);
    $pdf->Cell($nomWidth, 8, $rendezvous['daterendezvous'], 1, 0, 'C', $fill);
    $pdf->Cell($heureWidth, 8, $rendezvous['heure'], 1, 1, 'C', $fill);
    $fill = !$fill; // Inverser la couleur de fond
}

$pdf->Output('rendezvous_list.pdf', 'I');
