<?php
session_start();
include "../../controller/parapharmacie/produitc.php";
$c = new produitc();
$tab = $c->listproduit();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
    <title>Product Shop</title>
    <style>
        
 
        body {
            background-color: rgba(226, 226, 226, 0.603);
            margin: 0;
            font-family: Arial, sans-serif;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            width:98%;
            background-color: #4AD489;
            padding:15px;
            text-align: right;
            z-index: 100;
        }
        .navbar a {
            color: white;
            text-decoration: none;
            margin: 0 20px;
            font-size: 20px;
        }

        .cart-icon {
            font-size: 2rem;
            margin-right: 5px;
        }

.container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    align-items: center;
    padding: 20px;
}

        h1 {
            margin-top:100px;
            color: #4AD489;
            margin-bottom: 20px;
        }

        .product-card {
            width: 300px;
            background-color: #fff;
            border-radius: 15px;
            box-shadow: 0 9px 8px rgba(0, 0, 0, 0.1);
            margin:20px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out;
            cursor: pointer;
        }

        .product-card:hover {
            transform: scale(1.05);
        }

        .product-card img {
            width: 90%;
            height:200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
        }

        .product-card-content {
            padding: 25px;
        }

        h2 {
             margin-top: 0;
             font-size: 1.5rem;
             color: black;
        }

        p {
            color: black;
            margin-bottom: 5px;
        }

        .price {
            font-size: 1.2rem;
            color: black;
            font-weight: bold;
        }

        .quantity-input {
            width:50px;
            padding: 8px;
            margin-bottom: 10px;
            font-size: 14px;
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

            background-color:#138D75;

        }
label {
	width:500px;
	height:200px;
	position: relative;
	display: block;
	background: #ebebeb;
	border-radius: 200px;
	box-shadow: inset 0px 5px 15px rgba(0,0,0,0.4), inset 0px -5px 15px rgba(255,255,255,0.4);
	cursor: pointer;
	transition: 0.3s;
}
label:after {
	content: "";
	width:180px;
	height: 180px;
	position: absolute;
	top:10px;
	left:10px;
	background: linear-gradient(180deg,#ffcc89,#d8860b);
	border-radius: 180px;
	box-shadow: 0px 5px 10px rgba(0,0,0,0.2);
	transition: 0.3s;
}
input {
	width: 0;
	height: 0;
	visibility: hidden;
}
input:checked + label {
	background: #242424;
}
input:checked + label:after {
	left:490px;
	transform: translateX(-100%);
	background: linear-gradient(180deg,#777,#3a3a3a);
}
label:active:after{
	width: 260px;
}

input:checked + label + .background {
	background:#242424;
}
label svg {
	position: absolute;
	width: 120px;
	top:40px;
	z-index: 100;
}
label svg.sun {
	left:40px;
	fill:#fff;
	transition: 0.3s;
}

label svg.moon {
	left:340px;
	fill:#7e7e7e;
	transition: 0.3s;
}

input:checked + label svg.sun {
	fill:#7e7e7e;
}
input:checked + label svg.moon {
	fill:#fff;
}
.a {
    font-size: 80px;
    text-align: center;
    animation: titleAnimation 2s ease-in-out infinite alternate; /* Added animation property */
}
.btn {
            background-color: #4AD489;
            text-align: right;
            z-index: 100;
            }
            .back-to-home {
                position: absolute;
                top:32px;
                left: 16px;
            }
            
            .back-to-home a {
                color: white;
                text-decoration: none;
            }
            
            .back-to-home i {
                margin-right: 10px; /* Adjust the spacing between the icon and text as needed */
            }
            
@keyframes titleAnimation {
    0% {
        transform: scale(1);
    }
    100% {
        transform: scale(1.1);
    }
}
    </style>
</head>
<body onload="initCart();">
    <div class="navbar">

    <div class='back-to-home'>
            <a class='btn' href='../../View/index.php'><i class='fa fa-home'></i> Accueil</a>
        </div>
        <a href="card1.php">Cart <span class="cart-icon">🛒</span>(<span id="cart-count"></span>)</a>
    </div>
    <h1 class="a">Product Shop</h1>
    <div class="container">
    

        <?php foreach ($tab as $produit) { ?>
            <div class="product-card">
                <img src="../../tools/parapharmacie/<?php echo $produit['image']; ?>" alt="Product Image">
                <div class="product-card-content">
                    <h2><?= $produit['libelle']; ?></h2>
                    <p class="price">$<?= $produit['prix']; ?></p>
                    <input type="number" class="quantity-input" id="quantity_<?= $produit['code_produit']; ?>" value="1" min="1">
                    <button onclick="addToCart(
                        '<?= $produit['code_produit']; ?>',
                        '<?= $produit['libelle']; ?>',
                        '<?= $produit['description']; ?>',
                        '<?= $produit['image']; ?>',
                        <?= $produit['prix']; ?>,
                        document.getElementById('quantity_<?= $produit['code_produit']; ?>').value
                    )" class="button">Add to Cart</button>
                </div>
            </div>
        <?php } ?>
    </div>

    <script>
        function redirectToDetails(libelle, description, image, prix) {
            window.location.href = 'productdetails.php?libelle=' + libelle +
                '&description=' + description +
                '&image=' + image +
                '&prix=' + prix;
        }A

        function addToCart(code_produit, libelle, description, image, prix, quantite) {
            // Récupérer le panier actuel depuis localStorage
            let cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Calculer le total pour le produit
            let totalProduit = prix * quantite;

            // Ajouter le nouveau produit au panier avec la quantité et le total
            cart.push({
                code_produit: code_produit,
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
            alert("Product added to the cart:\n" + libelle + " - Quantity: " + quantite);
        }

        function initCart() {
            // Initialiser le panier s'il n'existe pas
            if (!localStorage.getItem('cart')) {
                localStorage.setItem('cart', JSON.stringify([]));
            }

            // Mettre à jour le compteur du panier
            document.getElementById('cart-count').innerText = JSON.parse(localStorage.getItem('cart')).length;
        }
    </script>
</body>
</html>
