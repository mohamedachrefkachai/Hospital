<?php

require '../../vendor/autoload.php';
include "../../Controller/pharmacie/medicamentC.php";


$Medicament = new MedicamentC();

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
$pdf->Cell(0, 10, 'Liste des medicament ', 0, 1, 'C');
// Set header row
$pdf->Cell($idWidth, 8, 'ID', 1, 0, 'C');
$pdf->Cell($medicamentWidth, 8, 'nom_medicament', 1, 0, 'C');
$pdf->Cell($staffWidth, 8, 'stock', 1, 0, 'C');
$pdf->Cell($patientWidth, 8, 'prix vente', 1, 0, 'C');
$pdf->Cell($nbPacketWidth, 8, 'prix achat', 1, 0, 'C');
$pdf->Cell($dateOrdWidth, 8, 'delai', 1, 0, 'C');
$pdf->Ln();

// Set data rows


// Fetch ordonnance data
$medicaments = $Medicament->listmedicament();

foreach ($medicaments as $medicament) {
    
    $pdf->Cell($idWidth, 8, $medicament['id_medicament'], 1, 0, 'C');
    $pdf->Cell($medicamentWidth, 8, $medicament['nom_medicament'], 1, 0, 'C');
    $pdf->Cell($staffWidth, 8, $medicament['nb_stock'], 1, 0, 'C');
    $pdf->Cell($patientWidth, 8, $medicament['prix_unitaire_vente'], 1, 0, 'C');
    $pdf->Cell($nbPacketWidth, 8, $medicament['prix_unitaire_achat'], 1, 0, 'C');
    $pdf->Cell($dateOrdWidth, 8, $medicament['delai'], 1, 0, 'C');
    $pdf->Ln();
}

// Output the PDF as a file (staff_information.pdf) to the browser
$pdf->Output('staff_information.pdf', 'I');
