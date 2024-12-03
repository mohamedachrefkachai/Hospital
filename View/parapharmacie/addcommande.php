<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require '../../vendor/autoload.php'; 

include '../../Controller/parapharmacie/commandec.php';
include '../../Model/parapharmacie/commande.php';

$error = "";
$commandec = new commandec();

if (
    !empty($_POST["nom"]) &&
    !empty($_POST["prenom"]) &&
    !empty($_POST["adresse"]) &&
    !empty($_POST["gsm"]) &&
    !empty($_POST["email"]) &&
    !empty($_POST["date_commande"])
) {

    $cartData = json_decode($_POST["cartData"], true);
    $sauv = false;  
    
    $id_panier = $commandec->getNextIdPanier();

    foreach ($cartData as $item) {
        if (isset($item['code_produit'])) {
            $code_produit = $item['code_produit'];
            $libelle = $item['libelle'];
            $prix = $item['prix'];
            $quantite=$item['quantite'];

            $commande = new Commande(
                null,
                $code_produit,
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['adresse'],
                intval($_POST['gsm']),
                $_POST['email'],
                $_POST['date_commande'],
                $id_panier,
                $quantite
            );

            $commandec->addCommande($commande, $id_panier, $quantite);
            $sauv = true;
        }
        else {
            // Gérer le cas où 'code_produit' n'est pas défini dans $item
            // Vous pouvez afficher un message d'erreur ou effectuer une action appropriée.
        }
    }

    if ($sauv) {
        // Calculate total price
        $totalPrice = 0;
        foreach ($cartData as $item) {
            $totalPrice += $item['prix'] * $item['quantite'];
        }
        $mail = new PHPMailer(true); 
        try {
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username='rayen.borgi@esprit.tn'; 
            $mail->Password='nayg xvne aamf kvyg';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Recipients
            $mail->setFrom('MediCoeur_Team@example.com','MediCoeur Team');
            $mail->addAddress($_POST['email']);

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'Confirmation commande';
            $mail->Body    = 'Votre commande a été prise avec succès Total Prix <p style=color:red>: '.$totalPrice .'DT </p>
            <p>Thank you,<br>MediCoeur Team</p>';

            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        // Display confirmation message with design
        echo "<!DOCTYPE html>
        <html lang='en'>
        <head>
            <meta charset='UTF-8'>
            <meta name='viewport' content='width=device-width, initial-scale=1.0'>
            <title>Confirmation</title>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
        <!-- Add icon library -->
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css'>
            <style>
            .back-to-home {
                position: absolute;
                top:20px;
                left: 16px;
            }
            
            .back-to-home a {
                color: white;
                text-decoration: none;
            }
            
            .back-to-home i {
                margin-right: 10px; /* Adjust the spacing between the icon and text as needed */
            }
            
            .btn {
                background-color: #4AD489;
                text-align: right;
                z-index: 100;
            }
            

                body {
                    
                    font-family: Arial, sans-serif;
                    background-color: #f4f4f4;
                    margin:0px;
                    padding: 0;
                }
                .navbar {
                    background-color: #4AD489;
                    padding:20px;
                    text-align: right;
                    height:30px;
                }

                .container {
                    margin-top:20px;
                    max-width: 600px;
                    margin:40px auto;
                    background-color: #fff;
                    padding: 20px;
                    box-shadow: 8px 5px 5px #4AD489;
                }

                h1{
                    text-align: center;
                    color:#4AD489;
                    font-size:20px;
                }

                ul {
                    list-style-type: none;
                    padding: 0;
                }

                li {
                    font-size:20px;
                    margin-bottom: 10px;
                }
                img{
                    height:50px;
                    padding-right: 10px;
                    position: absolute;
                    top: 8px;
                    left: 16px;
                }
                .far fa-home{
                    height:50px;
                    padding-right:30px;
                    position: absolute;
                    top: 8px;
                    left: 16px;
                }
           
                }
            .total-price {
        font-size: 24px;
        font-weight: bold;
        color: #4AD489; /* Use your preferred color */
        margin-top: 20px;
    }

            </style>
        </head>
        <body>
        
        <div class='navbar'>
        <div class='back-to-home'>
            <a class='btn' href='../../View/index.php'><i class='fa fa-home'></i> Accueil</a>
        </div>
    </div>

            <div class='container'>
                <h1>Your order has been successfully received</h1>
                <p><b>Détails de la commande:</b></p>
                <ul>";

        
        foreach ($cartData as $item) {
            echo "<li > Product:{$item['libelle']} <br> quantity:{$item['quantite']} <br>Price: {$item['prix']}dt</li><br><hr style='color:#4AD489;'>";
        }

        echo "<p  style='font-size:30px;color:red;'><b>Prix total: $totalPrice dt</b></p>
            </div>
        </body>
    
        
        </html>";
        
        exit;
    } 
    else {
        $error = "Missing information";
    }
}
?>
<script>
    function exportToPdf() {
    // Create a new jsPDF instance
    var pdf = new jsPDF();

    // Add content to the PDF
    pdf.text(30, 20, 'Your order has been successfully received');

    var yOffset = 40;
    <?php foreach ($cartData as $item): ?>
        pdf.text(20, yOffset, 'Product: <?php echo $item['libelle']; ?>');
        pdf.text(20, yOffset + 10, 'Quantity: <?php echo $item['quantite']; ?>');
        pdf.text(20, yOffset + 20, 'Price: <?php echo $item['prix']; ?> dt');
        yOffset += 40;
    <?php endforeach; ?>

    pdf.text(20, yOffset + 20, 'total price: <?php echo $totalPrice; ?> dt');

    // Save the PDF
    pdf.save('commande.pdf');
}
    </script>
<!-- Remaining HTML code -->
