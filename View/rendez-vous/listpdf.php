<?php

require '../../vendor/autoload.php';
include "../../Controller/rendez-vous/rendez-vousC.php";

$rendezvousController = new rendezvousC();

// Create a new TCPDF instance
$pdf = new TCPDF();

// Set document information
$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Staff Information List');

// Add a new page
$pdf->AddPage();

// Set column widths
$idrendezvousWidth = 30;
$idpatientWidth = 20;
$specialiteWidth = 30;
$nommedecinWidth = 30;
$daterendezvousWidth = 30;  // Adjust the width as needed
$heureWidth = 20;  // Adjust the width as needed
$emailWidth = 45;

// Set font size
$pdf->SetFont('helvetica', '', 10);
$pdf->Cell(0, 10, 'Liste des rendezvous ', 0, 1, 'C');
// Set header row
$pdf->Cell($idrendezvousWidth, 10, 'idrendezvous', 1, 0, 'C');
$pdf->Cell($idpatientWidth, 10, 'idpatient', 1, 0, 'C');
$pdf->Cell($specialiteWidth, 10, 'specialite', 1, 0, 'C');
$pdf->Cell($nommedecinWidth, 10, 'nommedecin', 1, 0, 'C');
$pdf->Cell($daterendezvousWidth, 10, 'daterendezvous', 1, 0, 'C');
$pdf->Cell($heureWidth, 10, 'heure', 1, 0, 'C');
$pdf->Cell($emailWidth, 10, 'email', 1, 1, 'C'); // Add a line break after the last column

// Set data rows

// Fetch rendezvous data
$rendezvouss = $rendezvousController->listrendez_vous();

foreach ($rendezvouss as $rendezvous) {
    $pdf->Cell($idrendezvousWidth, 8, isset($rendezvous['idrendezvous']) ? $rendezvous['idrendezvous'] : '', 1, 0, 'C');
    $pdf->Cell($idpatientWidth, 8, isset($rendezvous['idpatient']) ? $rendezvous['idpatient'] : '', 1, 0, 'C');
    $pdf->Cell($specialiteWidth, 8, isset($rendezvous['specialite']) ? $rendezvous['specialite'] : '', 1, 0, 'C');

    // Increase font size and set background color for the next cells
    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetFillColor(255, 255, 255); // Adjust the color as needed

    $pdf->Cell($nommedecinWidth, 8, isset($rendezvous['nommedecin']) ? $rendezvous['nommedecin'] : '', 1, 0, 'C');
    $pdf->Cell($daterendezvousWidth, 8, isset($rendezvous['daterendezvous']) ? $rendezvous['daterendezvous'] : '', 1, 0, 'C');
    $pdf->Cell($heureWidth, 8, isset($rendezvous['heure']) ? $rendezvous['heure'] : '', 1, 0, 'C');
    $pdf->Cell($emailWidth, 8, isset($rendezvous['email']) ? $rendezvous['email'] : '', 1, 1, 'C'); // Add a line break after the last column

    // Reset font size and background color for the next row
    $pdf->SetFont('helvetica', '', 10);
    $pdf->SetFillColor(255, 255, 255); // Reset to default white color
}

// Output the PDF as a file (staff_information.pdf) to the browser
$pdf->Output('staff_information.pdf', 'I');
