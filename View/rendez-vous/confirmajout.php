

<?php
require_once __DIR__ . '../../vendor/autoload.php';


// Assurez-vous que les données postées existent
if (isset($_POST["ajoutrendezvous"])) {
    // Récupérez les données postées depuis le formulaire
    $specialite = $_POST['specialite'];
    $nommedecin = $_POST['nommedecin'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $email = $_POST['email'];

    // Affichez les éléments ajoutés
    echo "<h2>Rendez-vous ajouté avec succès :</h2>";
    echo "<p><strong>Speciality :</strong> $specialite</p>";
    echo "<p><strong>Doctor's name</strong> $nommedecin</p>";
    echo "<p><strong>Date :</strong> $date</p>";
    echo "<p><strong>Houre :</strong> $heure</p>";
    echo "<p><strong>Email :</strong> $email</p>";

    // Afficher un lien pour télécharger le PDF
    echo "<p><a href='rendez_vouspdf.php?specialite=$specialite&nommedecin=$nommedecin&date=$date&heure=$heure&email=$email' target='_blank'>Télécharger le PDF</a></p>";

} else {
    // Redirigez l'utilisateur s'il tente d'accéder directement à ce script sans passer par le formulaire
    header("Location: chemin_vers_votre_formulaire.php");
    exit();
}
?>





