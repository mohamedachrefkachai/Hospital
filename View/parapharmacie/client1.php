<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color:#f4f4f4;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            
            height: 100vh;
        }

        .ordonnance-container {
            background-color: #fff;
            box-shadow: 8px 5px 5px #4AD489;
            border: 3px solid #4AD489;
            padding: 30px;
            border-radius: 4px;
            text-align: left;
            max-width: 600px;
            width: 100%;
            display: flex;
            /*align-items: center;*/
        }
    
        .details-container {
            margin-left: 20px;
        }

        h2 {
            color: #4AD489;
            margin-top:10px;
            font-size:40px;

            
        }

        p {
            margin: 10px 0;
            color: #555;
            font-size:20px;
        }

        button {
            background-color: #4AD489;
            color: #fff;
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #138D75;
        }

        img {
        max-width: 120px;
            border-radius: 0px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="ordonnance-container">
        <?php
        include "../../Controller/parapharmacie/produitc.php";
        include "../../Model/parapharmacie/produit.php";

        $produitc = new produitc();

        if (isset($_POST["id"])) {
            $id = $_POST["id"];
            $produits = $produitc->showproduit($id);

            if (!empty($produits)) {
                foreach ($produits as $produitt) {
                    ?>
                    <img class="img" src="../../tools/parapharmacie/<?php echo $produitt['image']; ?>" alt="Product Image">
                    <div class="details-container">
                        <h2>Code_product: <?php echo $produitt['code_produit']; ?></h2><br>
                        <p><strong>wording:</strong> <?php echo $produitt['libelle']; ?></p>
                        <p><strong>Price:</strong> <?php echo $produitt['prix']; ?></p>
                        <p><strong>Description:</strong> <?php echo $produitt['description']; ?></p>
                        <p><strong>Description:</strong> <?php echo $produitt['description']; ?></p>
    <form action="../../view/parapharmacie/generate_pdf2.php" method="post" target="_blank">
        <input type="hidden" name="id" value="<?php echo $produitt['code_produit']; ?>">
        <button type="submit">Export to PDF</button>
    </form>
    </form>
                    </div>
                    <?php
                }
            } else {
                echo '<p>Pas de résultat trouvé.</p>';
            }
        }
        ?>
    </div>
</body>
</html>
