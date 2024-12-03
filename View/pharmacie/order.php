<?php
include "../../Controller/pharmacie/ordonnanceC.php";

$ordonnanceC = new OrdonnanceC();

if (isset($_POST["id_ordonnance"])) {
    $id_ordonnance = $_POST["id_ordonnance"];

    
    $ordonnanceInfo = $ordonnanceC->getOrdonnanceInfoWithMedicaments($id_ordonnance);

    if (!empty($ordonnanceInfo)) {
        // Mettre à jour le stock pour chaque médicament
        foreach ($ordonnanceInfo['medicaments'] as $medicament) {
            $id_medicament = $medicament['id_medicament'];
            $quantityOrdered = $medicament['nb_packet'];

            // Mettre à jour le stock dans la table des médicaments
            $ordonnanceC->updateStock($id_medicament, $quantityOrdered);
        }

        // Mettre à jour la commande dans l'ordonnance
        $ordonnanceC->updateCommande($id_ordonnance);

        // Afficher les informations de l'ordonnance
echo '<div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">';
echo '<h2>Ordonnance' . $ordonnanceInfo['id_ordonnance'] . '</h2>';
echo '<p><strong>Date Ordonnance:</strong> ' . $ordonnanceInfo['date_ordonnance'] . '</p>';
echo '<p><strong>ID Patient:</strong> ' . $ordonnanceInfo['id_patient'] . '</p>';
echo '<p><strong>ID Staff:</strong> ' . $ordonnanceInfo['id_staff'] . '</p>';

echo '<h3>Prescribed drugs:</h3>';
echo '<ul>';
$prixTotal = 0;
foreach ($ordonnanceInfo['medicaments'] as $medicament) {
    $prix_unitaire_vente = $medicament['prix_unitaire_vente'];
    $prixTotal += $prix_unitaire_vente * $medicament['nb_packet'];

    echo '<li>';
    echo '<strong>ID drugs:</strong> ' . $medicament['id_medicament'] . '<br>';
    echo '<strong>Number of Packages:</strong> ' . $medicament['nb_packet'] . '<br>';
    echo '<strong>Fréquency:</strong> ' . $medicament['frequence'] . '<br>';
    echo '<strong>Duration:</strong> ' . $medicament['duree'] . '<br>';
    echo '<strong>Unit price:</strong> ' . $prix_unitaire_vente . ' DT<br>';
    echo '</li>';
}
echo '</ul>';

echo '<p><strong>Total Order Price:</strong> ' . $prixTotal . ' DT</p>';
echo '<p style="color: green;">L\'ordonnance a été commandée.</p>';
echo '</div>';

    } else {
        echo "Ordonnance non trouvée.";
    }
} else {
    echo "ID d'ordonnance non fourni.";
}
?>
