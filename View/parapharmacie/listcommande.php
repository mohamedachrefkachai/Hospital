<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../../controller/parapharmacie/commandec.php";
$c = new commandec();
$tab = $c->listcommande();
?>
</nav>
<link rel="stylesheet" href="../../tools/parapharmacie/style2.css">
<br><br>
<center>
    <h1 class="a">Order list</h1>
    <br><br>
    <h2>
</center>
<table class="table">
    <tr>
        <th>id_panier</th>
        <th>code_product</th>
        <th>name</th>
        <th>first name</th>
        <th>adresse</th>
        <th>gsm</th>
        <th>email</th>
        <th>order_date</th>
        <th>quantity</th>
        <th>action</th>
        
<?php

foreach ($tab as $commande) {
    ?>
    <tr>
        <td><?= $commande['id_panier']; ?></td>
        <td><?= $commande['code_produit']; ?></td>
        <td><?= $commande['nom']; ?></td>
        <td><?= $commande['prenom']; ?></td>
        <td><?= $commande['adresse']; ?></td>
        <td><?= $commande['gsm']; ?></td>
        <td><?= $commande['email']; ?></td>
        <td><?= $commande['date_commande']; ?></td>
        <td><?= $commande['quantite']; ?></td>
        <td>
            <form method="POST" action="../../View/parapharmacie/deletecommande.php">
                <input type="submit" name="supprimer" value="delete">
                <input type="hidden" value="<?= $commande['id_commande']; ?>" name="id_commande">
            </form>
        </td>
    </tr>
    <?php
}
?>

</table>
