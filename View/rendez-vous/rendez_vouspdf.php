<?php
require_once __DIR__ . '../../vendor/autoload.php';

use TCPDF as TCPDF;

// Récupérez les paramètres depuis l'URL
$specialite = urldecode($_GET['specialite'] ?? '');
$nommedecin = urldecode($_GET['nommedecin'] ?? '');
$date = urldecode($_GET['date'] ?? '');
$heure = urldecode($_GET['heure'] ?? '');
$email = urldecode($_GET['email'] ?? '');

// Générer le contenu PDF
$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 12); // Use 'helvetica' as a core font

$pdf->Cell(0, 10, 'Votre rendez_vous est ajouté avec succé :', 0, 1);
$pdf->Cell(0, 10, "Spécialité : $specialite", 0, 1);
$pdf->Cell(0, 10, "Nom du médecin : $nommedecin", 0, 1);
$pdf->Cell(0, 10, "Date : $date", 0, 1);
$pdf->Cell(0, 10, "Heure : $heure", 0, 1);
$pdf->Cell(0, 10, "Email : $email", 0, 1);

// Afficher le PDF dans le navigateur
$pdf->Output('rendezvous_details.pdf', 'I');
?>
