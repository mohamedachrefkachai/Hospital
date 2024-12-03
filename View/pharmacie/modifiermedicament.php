<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../../Controller/pharmacie/medicamentC.php';

include '../../Model/pharmacie/medicament.php';

if (isset($_POST["update"])) {
    
    $id = $_POST["toupdate"];
    $medicament = null;
    $medicamentC = new MedicamentC();

    
    if (
        isset($_POST["id_medicament"]) &&
        isset($_POST["nom_medicament"]) &&
        isset($_POST["nb_stock"]) &&
        isset($_POST["prix_unitaire_vente"]) &&
        isset($_POST["delai"]) &&
        isset($_POST["prix_unitaire_achat"])
    ) {
        if (
            !empty($_POST["id_medicament"]) &&
            !empty($_POST["nom_medicament"]) &&
            !empty($_POST["nb_stock"]) &&
            !empty($_POST["prix_unitaire_vente"]) &&
            !empty($_POST["delai"]) &&
            !empty($_POST["prix_unitaire_achat"])
        ) {
            
            $medicament = new Medicament(
                $_POST['id_medicament'],
                $_POST['nom_medicament'],
                $_POST['nb_stock'],
                $_POST['prix_unitaire_achat'],
                $_POST['delai'],
                $_POST['prix_unitaire_vente']
            );

            
            $medicamentC->updatemedicament($medicament, $id);

            
            header('Location: affichermedicament.php');
            exit; 
        } else {
            $error = "Missing information";
        }
    } else {
        $error = "Form fields are not set.";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit drugs</title>
</head>

<body>
    <h1 align="center">Edit drugs</h1>
    <?php
    if (isset($_POST["toupdate"])) {
        $id = $_POST["toupdate"];
        $medicament = $medicamentC->showmedicament($id);
    ?>
    <form align="center" method="post">
        <label for="id_medicament">New drug ID:</label>
        <input type="text" name="id_medicament" value="<?php echo $medicament["id_medicament"]; ?>" required><br>

        <label for="nom_medicament">Name drugs</label>
        <input type="text" name="nom_medicament" value="<?php echo $medicament["nom_medicament"]; ?>" required><br>

        <label for="nb_stock">Quantity in stock:</label>
        <input type="number" name="nb_stock" value="<?php echo $medicament["nb_stock"]; ?>" required><br>

        <label for="prix_unitaire_vente">Unit sales price:</label>
        <input type="number" step="0.01" name="prix_unitaire_vente" value="<?php echo $medicament["prix_unitaire_vente"]; ?>" required><br>

        <label for="delai">deadline</label>
        <input type="date" name="delai" value="<?php echo $medicament["delai"]; ?>" required><br>

        <label for="prix_unitaire_achat">Unit purchase price:</label>
        <input type="number" step="0.01" name="prix_unitaire_achat" value="<?php echo $medicament["prix_unitaire_achat"]; ?>" required><br>

        <input type="hidden" name="toupdate" value="<?php echo $id; ?>">
        <input type="submit" name="update" value="Update Medicament">
    </form>
    <?php
    }
    ?>
</body>

</html>
