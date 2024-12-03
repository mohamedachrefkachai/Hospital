<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "../../controller/parapharmacie/produitc.php";
$c = new produitc();
$tab = $c->listproduit();

// Si le formulaire de recherche est soumis
if (isset($_POST['search'])) {
    $id = $_POST['search'];
    $produit = $c->showproduit($id);
    if ($produit) {
        ?>
        
        <br><br>
        <center>
            <h1>Product Details</h1>
        </center>

        <table class="table">
            <tr>
                <th>code-product</th>
                <th>wording</th>
                <th>Price</th>
                <th>description</th>
                <th>photo</th>
                <th>update</th>
                <th>delete</th>
            </tr>
            <tr>
                <td><?= $produit['code_produit']; ?></td>
                <td><?= $produit['libelle']; ?></td>
                <td><?= $produit['prix']; ?></td>
                <td><?= $produit['description']; ?></td>
                <td><img src="../../tools/parapharmacie/<?php echo $produit['image']; ?>" style="width: 50px;" alt="Product Image"></td>

                <td align="center">
                    <form method="POST" action="../../View/parapharmacie/updateproduit.php">
                        <input type="submit" name="mise à jour" value="update">
                        <input type="hidden" value="<?= $produit['code_produit']; ?>" name="code_produit">
                    </form>
                </td>
                <td>
                    <form method="POST" action="../../View/parapharmacie/deleteProduit.php">
                        <input type="submit" name="supprimer" value="delete">
                        <input type="hidden" value="<?= $produit['code_produit']; ?>" name="code_produit">
                    </form>
                </td>
            </tr>
        </table>
    <?php
    } else {
        echo "Produit non trouvé.";
    }

    // Arrête l'exécution du script pour ne pas afficher la liste complète de produits
    exit();
}
?>

<link rel="stylesheet" href="../../tools/parapharmacie/style5.css">
<br><br>
<center>
    <h1>Product List</h1>
    <br><br>
    <h2>
        <a href="../../View/parapharmacie/addproduit.php" class="abb">Add prodcut</a>
        <a href="../../View/parapharmacie/generate_pdf.php" class="abb2">export to pdf</a>

    </h2>
   
    <!-- Ajoutez le formulaire de recherche -->

</center>

<table class="table">
    <tr>
        <th>code-product</th>
        <th>wording</th>
        <th>Price</th>
        <th>description</th>
        <th>photo</th>
        <th>update</th>
        <th>delete</th>
    </tr>
    <?php
    // Affiche la liste complète de produits seulement si le formulaire de recherche n'est pas soumis
    if (!isset($_POST['search'])) {
        foreach ($tab as $produit) {
    ?>
            <tr>
                <td><?= $produit['code_produit']; ?></td>
                <td><?= $produit['libelle']; ?></td>
                <td><?= $produit['prix']; ?></td>
                <td><?= $produit['description']; ?></td>
                <td><img src="../../tools/parapharmacie/<?php echo $produit['image']; ?>" style="width: 50px;" alt="Product Image"></td>

                <td align="center">
                    <form method="POST" action="../../View/parapharmacie/updateproduit.php">
                        <input type="submit" name="mise à jour" value="update">
                        <input type="hidden" value="<?= $produit['code_produit']; ?>" name="code_produit">
                    </form>
                </td>
                <td>
                    <form method="POST" action="../../View/parapharmacie/deleteProduit.php">
                        <input type="submit" name="supprimer" value="delete">
                        <input type="hidden" value="<?= $produit['code_produit']; ?>" name="code_produit">
                    </form>
                </td>
            </tr>
    <?php
        }
    }
    ?>
</table>
