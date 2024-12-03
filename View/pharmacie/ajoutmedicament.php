<?php
include "../../Controller/pharmacie/medicamentC.php";
include "../../Model/pharmacie/medicament.php";

$medicament = null;
$MedicamentC = new MedicamentC();

if (isset($_POST["ajoutmedicament"])) {
   
    $id = $_POST['Id_medicament'];
    $nom = $_POST['nom_medicament'];
    $nb_stock = $_POST['nb_stock'];
    $prixv = $_POST['prix_unitaire_vente'];
    $prixa = $_POST['prix_unitaire_achat'];
    $delai = $_POST['delai'];
    $medicament = new Medicament($id, $nom, $nb_stock, $prixv, $delai, $prixa);
    $MedicamentC->ajoutmedicament($medicament); 
    
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add drugs</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url(../tools/pharmacie.avif);
            background-size: cover;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .error-message {
            color: red;
            margin-top: -8px;
            margin-bottom: 10px;
        }

        button {
            background-color:#4AD489 ;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    <script src="../tools/controlesaisie.js"></script>
</head>

<body>
    <h1 style="color:#4AD489;">Add drugs</h1>
    <form action="" method="post" onsubmit="return validmedicament()">
        <label for="Id_medicament">Id-drugs:</label>
        <input type="text" id="id_medicament" name="Id_medicament">
        <div id="error-id" class="error-message"></div>

        <label for="nom_medicament">Name drugs:</label>
        <input type="text" id="nom_medicament" name="nom_medicament">
        <div id="error-nom" class="error-message"></div>

        <label for="nb_stock">Quantity in stock:</label>
        <input type="number" id="nb_stock" min="1" name="nb_stock">
        <div id="error-nb-stock" class="error-message"></div>

        <label for="prix_unitaire_vente">Unit sales price:</label>
        <input type="number" step="0.01" id="prix_unitaire_vente" name="prix_unitaire_vente">
        <div id="error-prix-vente" class="error-message"></div>

        <label for="delai">delai</label>
        <input type="date" id="delai" name="delai">
        <div id="error-delai" class="error-message"></div>

        <label for="prix_unitaire_achat">Unit purchase price:</label>
        <input type="number" step="0.01" id="prix_unitaire_achat" name="prix_unitaire_achat">
        <div id="error-prix-achat" class="error-message"></div>

        <button type="submit" name="ajoutmedicament">ADD</button>
    </form>

    
</body>

</html>
