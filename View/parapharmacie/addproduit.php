
<?php
include '../../Controller/parapharmacie/produitc.php';
include '../../Model/parapharmacie/produit.php';
$error = "";

$produit = null;


$produitC = new produitC();
if (
    isset($_POST["libelle"]) &&
    isset($_POST["prix"]) &&
    isset($_POST["photo"])&&
    isset($_POST["description"])
)

{
    if (
        !empty($_POST['libelle']) &&
        !empty($_POST["prix"]) &&
        !empty($_POST["photo"])&&
        !empty($_POST["description"])

    ) {

//echo "lib:" . $_POST["libelle"];
//echo "prix:" . $_POST["prix"];
//echo "photo:" . $_POST["photo"];
//exit(0);
        $produit = new produit(
            null,
            $_POST['libelle'],
            $_POST['prix'],
            $_POST['photo'],
            $_POST['description'],

        );
        $produitC->addproduit($produit);
        header('Location:../../View/parapharmacie/listproduit.php');
       
    } else
        $error = "Missing information";
}

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../tools/parapharmacie/style1.css"/>
    <title> Registration or Sign Up form in HTML CSS | CodingLab </title> 
*
    <script src="../../tools/parapharmacie/java.js"></script>
   </head>
<body>
  
  <div class="wrapper">
    <center><h2>Add product</h2></center>
    <form action="" method="POST"  >
      <div class="input-box">
        <input type="text" placeholder="wording" name="libelle" id="libelle">
      </div>
      <div class="input-box">
        <input type="number" placeholder="price" name="prix" id="prix">
      </div>
      <div class="input-box">
        <input type="text" placeholder="desciption"  name="description" id="description">
      </div>
      <div class="input-box">
        <input type="file" placeholder="file"  name="photo" id="photo">
      </div>
    <input type="submit" value="save" class="button">
    </form>
  </div>
</body>
</html>