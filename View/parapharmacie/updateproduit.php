
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../../Controller/parapharmacie/produitc.php';
include '../../Model/parapharmacie/produit.php';
$error = "";
$produitc= new produitc();
if (
    isset($_POST["code_produit"]) &&
    isset($_POST["libelle"]) &&
    isset($_POST["prix"])&&
    isset($_POST["image"]) &&
    isset($_POST["description"])


) {
    if (
        !empty($_POST['code_produit']) &&
        !empty($_POST["libelle"]) &&
        !empty($_POST["prix"])&&
        isset($_POST["image"]) &&
        isset($_POST["description"])  
    ) {
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $produit = new produit(
            $_POST['code_produit'],
            $_POST['libelle'],
            $_POST['prix'],
            $_POST['image'],
            $_POST['description']


        );
        var_dump($produit);
       
        $produitc->updateproduit($produit, $_POST['code_produit']);
        //echo "POST data: ";
       // print_r($_POST);
        header('Location:../../View/parapharmacie/listproduit.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>User Display</title>
</head>
<style>
    body {
    font-family: Arial, sans-serif;
}

button {
    margin-bottom: 10px;
}

#error {
    color: red;
    font-weight: bold;
}

form {
    max-width: 600px;
    margin: 20px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
    box-shadow: 8px 5px 5px #4AD489;

}

table {
    width: 100%;
}

table td {
    padding: 10px;
}

input[type="text"],
input[type="number"],
input[type="file"] {
    width: 100%;
    padding: 8px;
    margin: 5px 0;
    box-sizing: border-box;
}

input[type="submit"],
input[type="reset"] {
    background-color:#4AD489;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    margin-right: 5px;
}

input[type="submit"]:hover,
input[type="reset"]:hover {
    background-color: #45a049;
}
</style>
<body>
        <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['code_produit'])) {
        $produit = $produitc->showproduit($_POST['code_produit']);
        foreach ($produit as $p)
        {
            

    ?>

<form action="" method="POST" >

            <table>
            <tr>
                    <td><label for="code_produit">code_product :</label></td>
                    <td>
                        <input type="text" id="code_produit" name="code_produit" value="<?php echo $_POST['code_produit'] ?>" readonly />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="libelle">wording:</label></td>
                    <td>
                        <input type="text" id="libelle" name="libelle" value="<?php echo $p['libelle'] ?>" />
                        <span id="erreurNom" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="prix">Price :</label></td>
                    <td>
                        <input type="number" id="prix" name="prix" value="<?php echo $p['prix'] ?>" />
                        <span id="erreurProduit" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="description">description:</label></td>
                    <td>
                        <input type="text" id="description" name="description" value="<?php echo $p['description'] ?>" />
                        <span id="erreurProduit" style="color: red"></span>
                    </td>
                </tr>
                <tr>
                    <td><label for="image">image:</label></td>
                    <td>
                        <input type="file" id="image" name="image" value="<?php echo $p['image'] ?>" />
                        <span id="erreurimage" style="color: red"></span>
                    </td>
                </tr>
<td>
                <input type="submit" name="update_product" value="update">
    </td>
            </table>

        </form>
    <?php
    }
    }
    ?>
</body>

</html>