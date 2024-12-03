<?php

require '../vendor/autoload.php';
include "../Controller/ordonnanceC.php";

$ordonnanceController = new OrdonnanceC();

// Create a new TCPDF instance
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Staff Information List');

// Add a new page
$pdf->AddPage();

// Set column widths
$idWidth = 10;
$medicamentWidth = 15;
$staffWidth = 25;
$patientWidth = 25;
$nbPacketWidth = 15;
$dateOrdWidth = 25;
$frequenceWidth = 40;
$dureeWidth = 20;

// Set font size
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(0, 10, 'Liste des ordonnances ', 0, 1, 'C');
// Set header row
$pdf->Cell($idWidth, 8, 'ID', 1, 0, 'C');
$pdf->Cell($medicamentWidth, 8, 'id Medicament', 1, 0, 'C');
$pdf->Cell($staffWidth, 8, 'id Staff', 1, 0, 'C');
$pdf->Cell($patientWidth, 8, 'Patient', 1, 0, 'C');
$pdf->Cell($nbPacketWidth, 8, 'Nb Packet', 1, 0, 'C');
$pdf->Cell($dateOrdWidth, 8, 'Date Ord', 1, 0, 'C');
$pdf->Cell($frequenceWidth, 8, 'Frequence', 1, 0, 'C');
$pdf->Cell($dureeWidth, 8, 'Duree', 1, 1, 'C'); // New line

// Set data rows

$id=
// Fetch ordonnance data
$ordonnances = $ordonnanceController->showordonnance($id);

foreach ($ordonnances as $ordonnance) {
    $pdf->Cell($idWidth, 8, $ordonnance['id_ordonnance'], 1, 0, 'C');
    $pdf->Cell($medicamentWidth, 8, $ordonnance['id_medicament'], 1, 0, 'C');
    $pdf->Cell($staffWidth, 8, $ordonnance['id_staff'], 1, 0, 'C');
    $pdf->Cell($patientWidth, 8, $ordonnance['id_patient'], 1, 0, 'C');
    $pdf->Cell($nbPacketWidth, 8, $ordonnance['nb_packet'], 1, 0, 'C');
    $pdf->Cell($dateOrdWidth, 8, $ordonnance['date_ordonnance'], 1, 0, 'C');
    $pdf->Cell($frequenceWidth, 8, $ordonnance['frequence'], 1, 0, 'C');
    $pdf->Cell($dureeWidth, 8, $ordonnance['duree'], 1, 1, 'C'); // New line
}

// Output the PDF as a file (staff_information.pdf) to the browser
$pdf->Output('staff_information.pdf', 'I');
