<?php

require '../../vendor/autoload.php';
include "../../Controller/parapharmacie/produitc.php";

$produit = new produitc();

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $produits = $produit->showproduit($id);

    if (!empty($produits)) {
        $pdf = new TCPDF();

        $pdf->SetCreator('Your Name');
        $pdf->SetAuthor('Your Name');
        $pdf->SetTitle('Product Details');

        $pdf->AddPage();

        // Set font
        $pdf->SetFont('helvetica', '', 12);

        foreach ($produits as $produitt) {
            // Add product details to the PDF
            $pdf->SetFont('helvetica', 'B', 16);
            $pdf->SetTextColor(0, 0, 0); // Black text color
            $pdf->Cell(0, 10, 'Product Details', 0, 1, 'C');

            $pdf->SetFont('helvetica', 'B', 12);

            // Set background color for all details
            $pdf->SetFillColor(144, 238, 144); // Light green background color
            $pdf->SetTextColor(0, 0, 0); // Black text color

            // Code_produit
            $pdf->Cell(0, 10, 'Code_product: ' . $produitt['code_produit'], 0, 1, '', true);

            // Libelle
            $pdf->Cell(0, 10, 'wording: ' . $produitt['libelle'], 0, 1, '', true);

            // Prix
            $pdf->Cell(0, 10, 'Price: ' . $produitt['prix'], 0, 1, '', true);

            // Description
            $pdf->Cell(0, 10, 'Description: ' . $produitt['description'], 0, 1, '', true);

            $pdf->Cell(0, 10, '', 0, 1);
        }
        $pdf->Output('product_details.pdf', 'I');
    } else {
        echo 'Product not found.';
    }
} else {
    echo 'Product ID not provided.';
}
?>
