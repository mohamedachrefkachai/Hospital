<?php
include "../../controller/parapharmacie/produitc.php";
$c = new produitc();
$tab = $c->listproduit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Shop</title>
    <style>
      body {
    background-color:rgba(226, 226, 226, 0.603);
    font-family: 'Arial', sans-serif;
}

.navbar {
            position: fixed;
            top: 0;
            left: 0;
            width:100%;
            background-color: #4AD489;
            padding:40px;
            text-align: right;
            z-index: 1000;
        }
.navbar a {
    color: white;
    text-decoration: none;
    margin: 0 10px;
}

.cart-icon {
   
}

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 20px;
}

.product-card {
    width:200px;
    background-color: #fff;
    border-radius:10px;
    box-shadow: 0 8px 8px #003f72;
    margin:5px;
    overflow: hidden;
    transition: transform 0.3s ease-in-out;
    cursor: pointer;
}

.product-card:hover {
    transform: scale(1.05);
}

.product-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-bottom: 1px solid #ddd;
}

.product-card-content {
    padding: 15px;
}

h2 {
    margin-top: 0;
    font-size: 1.5rem;
}

.price {
    font-size: 1.2rem;
    color: #003f72;
    font-weight: bold;
}

input[type="number"] {
    width: 50px;
}

.button {
    border: none;
    outline: 0;
    padding: 12px;
    color: white;
    background-color: #4AD489;
    text-align: center;
    cursor: pointer;
    width: 100%;
    font-size: 18px;
    margin-top: 10px;
}

.button:hover {
    opacity: 0.9;
}

table.rb {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.rb th,
td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
}

.rb th {
    background-color: #4AD489;
    color: white;
}

.rb img {
    max-width: 50px;
    max-height: 50px;
    object-fit: cover;
}

form {
    max-width: 100%;
    margin: 10px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

form input {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    box-sizing: border-box;
}

form input[type="submit"] {
    background-color: #4AD489;
    color: white;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #138D75;
}

.btn {
    background-color: #4AD489;
    color: white;
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}

.btn:hover {
    background-color: #138D75;
}

button {
    background-color: #4AD489;
    color: white;
    padding: 10px;
    margin-top: 10px;
    cursor: pointer;
    border: none;
    border-radius: 4px;
}

button:hover {
    background-color: #138D75;
}
.order-list {
        width: 100%;
        border-collapse: collapse;
        margin-top:130px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .order-list th,
    .order-list td {
        border: 1px solid #ddd;
        padding: 15px;
        text-align: left;
    }

    .order-list th {
        background-color: #4AD489;
        color: white;
    }

    .order-list img {
        max-width: 60px;
        max-height: 60px;
        object-fit: cover;
        border-radius: 5px;
    }

    .order-list td {
        vertical-align: middle;
    }

    .order-list .quantity,
    .order-list .total {
        text-align: center;
    }

    .order-list .action {
        text-align: center;
    }

    .order-list button {
        background-color: #f44336;
        color: white;
        border: none;
        padding: 8px 12px;
        cursor: pointer;
        border-radius: 4px;
        transition: background-color 0.3s ease;
    }

    .order-list button:hover {
        background-color: #d32f2f;
    }
    .cart{
    position:absolute;
    right:100px;
    top:9px;
    font-size: 1.2rem;
    }
    </style>
</head>
<body onload="displayCart();">
    <div class="navbar">
        <a href="#" onclick="displayCart()" class="cart">Cart <span class="cart-icon">🛒</span>(<span id="cart-count"></span>)</a>
    </div>
    <div id="node-id"></div>
    <div id="productDiv" class="container">
        <center>
            <h1>Product Shop</h1>
        </center>

        <?php foreach ($tab as $produit) { ?>
            <div class="product-card">
                <img src="../tools/parapharmacie/<?php echo $produit['image']; ?>" alt="Product Image">
                <div class="product-card-content">
                    <h2><?= $produit['libelle']; ?></h2>
                    <p class="price">$<?= $produit['prix']; ?></p>
                    <input type="number" id="quantity_<?= $produit['code_produit']; ?>" value="1" min="1">
                    <input type="button" value="+" onclick="updateQuantity('quantity_<?= $produit['code_produit']; ?>', 1)">
                    <input type="button" value="-" onclick="updateQuantity('quantity_<?= $produit['code_produit']; ?>', -1)">
                    <button onclick="addToCart(
                        '<?= $produit['libelle']; ?>',
                        '<?= $produit['description']; ?>',
                        '<?= $produit['image']; ?>',
                        <?= $produit['prix']; ?>,
                        document.getElementById('quantity_<?= $produit['code_produit']; ?>').value
                    )" class="button">Ajouter au panier</button>
                </div>
            </div>
        <?php } ?>
</div>
<form action="../../view/parapharmacie/addcommande.php" method="POST" id="commandeForm" onsubmit="return prepareCartData()" >
    <input type="hidden" name="cartData" id="cartDataInput">
    <input type="hidden" name="code_produit" value="<?= isset($lastItem['code_produit']) ? $lastItem['code_produit'] : ''; ?>">
    <input type="hidden" name="libelle" value="<?= isset($lastItem['libelle']) ? $lastItem['libelle'] : ''; ?>">
    <input type="hidden" name="prix" value="<?= isset($lastItem['prix']) ? $lastItem['prix'] : ''; ?>">
    <input type="text" name="nom" placeholder="Name">
    <input type="text" name="prenom" placeholder="first name">
    <input type="text" name="adresse" placeholder="Adresse">
    <input type="text" name="gsm" placeholder="GSM">
    <input type="text" name="email" placeholder="Email">
    <input type="hidden" name="date_commande" placeholder="Order date"  value = '<?= date("Y/m/d"); ?>' >
    <input type="submit" value="Commander" class="btn">
</form> 

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

    // Vérifier si le produit est déjà dans le panier
    let existingProductIndex = cart.findIndex(product => product.libelle === libelle);

    if (existingProductIndex !== -1) {
        // Si le produit existe déjà, mettre à jour la quantité et le total
        cart[existingProductIndex].quantite += parseInt(quantite);
        cart[existingProductIndex].totalProduit = cart[existingProductIndex].prix * cart[existingProductIndex].quantite;
    } else {
        // Si le produit n'existe pas, ajouter un nouvel élément au panier
        let totalProduit = prix * parseInt(quantite);
        cart.push({
            libelle: libelle,
            description: description,
            image: image,
            prix: prix,
            quantite: parseInt(quantite),
            totalProduit: totalProduit
        });
        alert("Produit ajouté au panier :\n" + libelle + " - Quantité : " + quantite);

    }

    // Mettre à jour le compteur du panier
    document.getElementById('cart-count').innerText = cart.length;

    // Enregistrer le panier mis à jour dans localStorage
    localStorage.setItem('cart', JSON.stringify(cart));

    // Vous pouvez également afficher un message ou effectuer d'autres actions si nécessaire
    alert("Produit ajouté au panier :\n" + libelle + " - Quantité : " + quantite);
}


        function removeFromCart(index) {
            // Récupérer le panier actuel depuis localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Supprimer l'élément à l'index spécifié
            cart.splice(index, 1);

            // Mettre à jour le compteur du panier
            document.getElementById('cart-count').innerText = cart.length;

            // Enregistrer le panier mis à jour dans localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Rafraîchir l'affichage du panier
            displayCart();
        }

        function displayCart() {
            // Logique pour afficher le panier
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            let lstcart = "<table class='order-list'>";
            lstcart += "<tr><th>Image</th><th>wording</th><th>Description</th><th>Price</th><th>Quantity</th><th>Total</th><th>Action</th></tr>";

            for (i = 0; i < cart.length; i++) {
                lstcart += "<tr>";
                lstcart += "<td><img src='../../tools/parapharmacie/" + cart[i].image + "' alt='Product Image' style='max-width: 50px; max-height: 50px; object-fit: cover;'></td>";
                lstcart += "<td>" + cart[i].libelle + "</td>";
                lstcart += "<td>" + cart[i].description + "</td>";
                lstcart += "<td>" + cart[i].prix + "</td>";
                lstcart += "<td>" + cart[i].quantite + "</td>";
                lstcart += "<td>" + cart[i].totalProduit + "</td>";
                lstcart += "<td><img src='../../tools/parapharmacie/SUPP.png' alt='Supprimer' onclick='removeFromCart(" + i + ")' style='height:50px;'></td>";
                lstcart += "</tr>";
            }

            lstcart += "</table>";

            let node = document.getElementById('node-id');
            node.innerHTML = lstcart;

            document.getElementById('productDiv').style.display = 'none';
        }

        function initCart() {
            localStorage.clear();
        }
        function redirectToProductList() {
            // Rediriger vers la page list1.php
            window.location.href = 'listproduit1.php';
        }

        function updateQuantity(quantityId, change) {
            // Récupérer la quantité actuelle
            let currentQuantity = parseInt(document.getElementById(quantityId).value);

            // Mettre à jour la quantité en fonction du changement (positif pour +, négatif pour -)
            let newQuantity = currentQuantity + change;

            // Assurez-vous que la quantité reste au minimum 1
            newQuantity = Math.max(newQuantity, 1);

            // Mettre à jour la valeur de l'input de quantité
            document.getElementById(quantityId).value = newQuantity;
        }

        function prepareCartData() {
            let cart = JSON.parse(localStorage.getItem('cart')) || [];
            let cartDataInput = document.getElementById('cartDataInput');

            // Convertir le tableau du panier en une chaîne JSON et l'assigner à la valeur de l'input
            cartDataInput.value = JSON.stringify(cart);
            localStorage.clear();

            // Permettre au formulaire d'être soumis normalement
            return true;
        }

    </script>
    <button onclick="redirectToProductList()" class="sup">Back to product list</button>

</body>
</html>
