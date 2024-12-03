<?php
// Start the session to access session variables
session_start();

// Check if the 'commande_details' session variable is set
if (isset($_SESSION['commande_details'])) {
    $commandeDetails = $_SESSION['commande_details'];
    // Clear the session variable to avoid displaying the same details on subsequent visits
    unset($_SESSION['commande_details']);
} else {
    // Redirect to the main page if the session variable is not set
    header('Location: ../../View/index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../tools/parapharmacie/style111.css">
    <title>Commande Details</title>
</head>
<body>
    <nav>
        <ul class="menu">
            <img src="../../tools/parapharmacie/hp.png" class="logo">
            <li><a>Commande Details</a></li>
            <!-- Add links to other pages if needed -->
        </ul>
    </nav>

    <div class="command-details-container">
        <h2>Commande Details</h2>
        <p>Nom: <?php echo $commandeDetails['nom']; ?></p>
        <p>Prenom: <?php echo $commandeDetails['prenom']; ?></p>
        <!-- Add more details as needed -->
    </div>
</body>
</html>
