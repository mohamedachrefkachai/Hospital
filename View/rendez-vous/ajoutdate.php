<?php
include "../../Controller/rendez-vous/dateC.php";
include "../../Model/rendez-vous/date.php";

$date = null;
$dateC = new dateC();

// Vérifier si le formulaire est soumis
if (isset($_POST["date"])) {
    // Récupérer les valeurs du formulaire
    $id_staff = $_POST['id_staff'];
    $date = $_POST['date'];
    $nbrendezvous = $_POST['nbrendezvous'];
    $heure = $_POST['heure'];
   

    // Créer l'objet Ordonnance
  // Créer l'objet date
$date = new date($id_staff, $date, $nbrendezvous, $heure);


    // Déboguer : Afficher les valeurs de l'objet Ordonnance
    echo "Contenu de date : ";
    var_dump($date);

    try {
        // Ajouter à la base de données
        $dateC->ajoutdate($date);

        echo "La date a été ajoutée avec succès à la base de données.";
    } catch (Exception $e) {
        // Gérer les erreurs SQL
        echo "Erreur lors de l'ajout à la base de données : " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add date</title>
    <link rel="stylesheet".href ="../../tools/rendez-vous/stlye2.css">
    <style>
       body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            width: 50%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }

    </style>
</head>

<body>
    <h1>Add date</h1>
    <form action="" method="post">
        
    <label>Idstaff:</label>
    <input type="text" id="idstaff" name="id_staff" required>


        

    <label >Date:</label>
        <input type="date" id="date" name="date" required>

        <label>number of appointments:</label>
        <input type="text" id="nbrendezvous" name="nbrendezvous" required>


        <label >Hour:</label>
        <input type="time" id="heure" name="heure" required>

        <button type="submit" name="ajoutdate">Add</button>
    </form>
</body>

</html>
