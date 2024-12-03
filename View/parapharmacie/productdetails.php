<?php
include "../controller/produitc.php";
$c = new produitc();
$tab = $c->listproduit();
$libelle = isset($_GET['libelle']) ? $_GET['libelle'] : '';
$description = isset($_GET['description']) ? $_GET['description'] : '';
$image = isset($_GET['image']) ? $_GET['image'] : '';
$prix = isset($_GET['prix']) ? $_GET['prix'] : '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <style>
        body {
            background-color: #f4f4f4;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        .navbar {
            background-color: #003f72;
            padding: 15px;
            text-align: right;
        }

        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-size: 18px;
        }

        .details-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0 auto;
        }

        .product-details {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            display: flex;
            max-width: 800px;
            width: 100%;
            margin-top: 20px;
        }

        .product-img {
            width:300px;
            height:300px;
            padding-right:20px;
            border-radius: 8px 0 0 8px;
        }

        .details-content {
            padding:10px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .price {
            font-size: 1.5rem;
            color: #003f72;
            font-weight: bold;
            margin-bottom:10px;
        }

        p {
            font-size: 1.2rem;
            color: #555;
            margin-bottom:10px;
        }

        .button {
            border: none;
            outline: 0;
            padding: 12px;
            color: white;
            background-color: #003f72;
            text-align: center;
            cursor: pointer;
            font-size: 18px;
            border-radius: 8px;
            text-decoration: none;
            display: inline-block;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #001f3e;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <a href="#">Home</a>
        <a href="#">Products</a>
        <a href="#">Contact</a>
    </div>

    <div class="details-container">
        <div class="product-details">
            <img class="product-img" src="../tools/<?= $image; ?>" alt="Product Image">
            <div class="details-content">
                <h2><?= $libelle; ?></h2>
                <p class="price">$<?= $prix; ?></p>
                <p><?= $description; ?></p>
                <a href="#" onclick="addToCart()" class="button">Add to Cart</a>
            </div>
        </div>
    </div>

    <script>
          function redirectToDetails(libelle, description, image, prix) {
            window.location.href = 'productdetails.php?libelle=' + libelle +
                '&description=' + description +
                '&image=' + image +
                '&prix=' + prix;
        }
     function addToCart(libelle, description, image, prix, quantite) {
            // Récupérer le panier actuel depuis localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Calculer le total pour le produit
            let totalProduit = prix * quantite;

            // Ajouter le nouveau produit au panier avec la quantité et le total
            cart.push({
                libelle: libelle,
                description: description,
                image: image,
                prix: prix,
                quantite: quantite,
                totalProduit: totalProduit
            });

            // Mettre à jour le compteur du panier
            document.getElementById('cart-count').innerText = cart.length;

            // Enregistrer le panier mis à jour dans localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Vous pouvez également afficher un message ou effectuer d'autres actions si nécessaire
            alert("Produit ajouté au panier :\n" + libelle + " - Quantité : " + quantite);
        }

</body>
</html>
