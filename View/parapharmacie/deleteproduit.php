<?php
include '../../Controller/parapharmacie/produitc.php';

if (isset($_POST['code_produit'])) {
    $code_produit = $_POST['code_produit'];

    $produitc = new produitc();
    $produitc->deleteproduit($code_produit);
    header('Location: ../../View/parapharmacie/listproduit.php');
} else {
    // Gérer le cas où $_POST['code_produit'] n'est pas défini
    echo "Erreur: Code produit non spécifié.";
}
?>