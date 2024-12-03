<?php

require '../../vendor/autoload.php';
include "../../Controller/User/StaffC.php";

$staff = new StaffC();

$pdf = new TCPDF();

$pdf->SetCreator('Your Name');
$pdf->SetAuthor('Your Name');
$pdf->SetTitle('Staff Information List');

$pdf->AddPage();

// Add hospital logo
$logoPath = '../../tools/User/logo.png'; 
$pdf->Image($logoPath, 20, 90, 180, '', 'PNG');

// Set column widths
$idWidth = 10;
$cinWidth = 15;
$nomWidth = 25;
$prenomWidth = 25;
$genreWidth = 15;
$dateBirthWidth = 25;
$emailWidth = 40;
$telWidth = 20;
$roleWidth = 20;


$pdf->SetFont('helvetica', 'B', 14);
$pdf->SetTextColor(33, 150, 243); 
$pdf->Cell(0, 10, 'MediCoeur Team', 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0); 

// Set font size
$pdf->SetFont('helvetica', '', 8);
$pdf->Cell(0, 10, 'Staff LIST ', 0, 1, 'C');
// Set header row
$pdf->Cell($idWidth, 8, 'ID', 1, 0, 'C');
$pdf->Cell($cinWidth, 8, 'CIN', 1, 0, 'C');
$pdf->Cell($nomWidth, 8, 'Nom', 1, 0, 'C');
$pdf->Cell($prenomWidth, 8, 'Prenom', 1, 0, 'C');
$pdf->Cell($genreWidth, 8, 'Genre', 1, 0, 'C');
$pdf->Cell($dateBirthWidth, 8, 'Date de Naissance', 1, 0, 'C');
$pdf->Cell($emailWidth, 8, 'E-mail', 1, 0, 'C');
$pdf->Cell($telWidth, 8, 'Téléphone', 1, 0, 'C');
$pdf->Cell($roleWidth, 8, 'Role', 1, 1, 'C');

// Set data rows

$staffList = $staff->liststaff();
foreach ($staffList as $staffMember) {
    $pdf->Cell($idWidth, 8, $staffMember['Id_staff'], 1, 0, 'C');
    $pdf->Cell($cinWidth, 8, $staffMember['cin'], 1, 0, 'C');
    $pdf->Cell($nomWidth, 8, $staffMember['Nom'], 1, 0, 'C');
    $pdf->Cell($prenomWidth, 8, $staffMember['Prenom'], 1, 0, 'C');
    $pdf->Cell($genreWidth, 8, $staffMember['Genre'], 1, 0, 'C');
    $pdf->Cell($dateBirthWidth, 8, $staffMember['Date_Birth'], 1, 0, 'C');
    $pdf->Cell($emailWidth, 8, $staffMember['E_mail'], 1, 0, 'C');
    $pdf->Cell($telWidth, 8, $staffMember['tel'], 1, 0, 'C');
    $pdf->Cell($roleWidth, 8, $staffMember['Role'], 1, 1, 'C');
}

$pdf->Output('staff_information.pdf', 'I');
