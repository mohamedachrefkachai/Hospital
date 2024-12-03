<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include '../controller/parapharmacie/commandec.php';
include '../model/parapharmacie/commande.php';

$error = "";
$commandec = new commandec();

if (
    isset($_POST["id_commande"]) &&
    isset($_POST["code_produit"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["gsm"]) &&
    isset($_POST["email"]) &&
    isset($_POST["date_commande"])
) {
    if (
        !empty($_POST["id_commande"]) &&
        !empty($_POST["code_produit"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["gsm"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["date_commande"])
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }

        $commande = new Commande(
            $_POST['id_commande'],
            $_POST['code_produit'],
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['adresse'],
            $_POST['gsm'],
            $_POST['email'],
            $_POST['date_commande']
        );

        var_dump($commande);

        $commandec->updatecommande($commande, $_POST['id_commande']);
        header('Location:../../View/parapharmacie/listcommande.php');
        exit();
    } else {
        $error = "Missing information";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../tools/parapharmacie/style1.css">
    <title>User Display</title>
</head>
<style>/* Ajoutez ces styles à votre fichier CSS (style1.css) */

body {
    font-family: 'Arial', sans-serif;
    background: color #f0f ;
    margin: 0;
    padding: 0;
}

button {
    background-color: #003f72;
    color: white;
    padding: 10px 15px;
    border: none;
    text-decoration: none;
    margin-top: 20px;
    margin-left: 20px;
    cursor: pointer;
}

hr {
    border: 1px solid #ddd;
    margin-top: 20px;
}

#error {
    color: red;
    font-weight: bold;
    margin: 10px;
}

form {
    margin: 20px;
}

table {
    width: 50%;
    margin: auto;
}

td {
    padding: 10px;
}

input {
    width: 100%;
    padding: 8px;
    margin-bottom: 10px;
}

input[type="submit"], input[type="reset"] {
    background-color: #003f72;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    border-radius: 5px;

}

input[type="submit"]:hover, input[type="reset"]:hover {
    background-color: #003f72;
    border-radius: 5px;

}

span {
    margin-left: 5px;
}

a {
    text-decoration: none;
    color: white;
}

.btn-1 {
    background: #003f72;
    border: none;
    text-decoration: none; /* Supprime la décoration du texte */
    padding: 10px 15px;
    color: white;
    cursor: pointer;
    border-radius: 5px;

}

.btn-1:hover {
    background: rgb(0,3,255);
    background: linear-gradient(0deg, rgba(0,3,255,1) 0%, rgba(2,126,251,1) 100%);
}


/* 2 */

</style>
<body>
<button onclick="window.location.href = '../View/parapharmacie/listcommande.php';" class="btn-1">Cliquez Ici</button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_commande'])) {
        $commande = $commandec->showcommande($_POST['id_commande']);
    ?>

    <form method="POST">

        <table>
            <tr>
                <td><label for="id_commande"> id_produit:</label></td>
                <td>
                    <input type="number" id="id_commande" name="id_commande" value="<?php echo $_POST['id_commande'] ?>" readonly />
                    <span id="erreurIdCommande" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="code_produit">Code Produit:</label></td>
                <td>
                    <input type="text" id="code_produit" name="code_produit" value="<?php echo $commande['code_produit'] ?>"  />
                    <span id="erreurCodeProduit" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="nom">Nom :</label></td>
                <td>
                    <input type="text" id="nom" name="nom" value="<?php echo $commande['nom'] ?>" />
                    <span id="erreurNom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="prenom">Prenom:</label></td>
                <td>
                    <input type="text" id="prenom" name="prenom" value="<?php echo $commande['prenom'] ?>"   />
                    <span id="erreurPrenom" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="adresse">Adresse:</label></td>
                <td>
                    <input type="text" id="adresse" name="adresse" value="<?php echo $commande['adresse'] ?>"  />
                    <span id="erreurAdresse" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="gsm">GSM:</label></td>
                <td>
                    <input type="number" id="gsm" name="gsm" value="<?php echo $commande['gsm'] ?>"  />
                    <span id="erreurGSM" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="email">Email:</label></td>
                <td>
                    <input type="text" id="email" name="email" value="<?php echo $commande['email'] ?>"  />
                    <span id="erreurEmail" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td><label for="date_commande">Date Commande:</label></td>
                <td>
                    <input type="text" id="date_commande" name="date_commande" value="<?php echo $commande['date_commande'] ?>"  />
                    <span id="erreurDateCommande" style="color: red"></span>
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="update_product" value="Update">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>

    </form>
    <?php
    }
    ?>
</body>

</html>
