<?php

include "../../Controller/User/PatientC.php";

$patient = new PatientC();
$tab = $patient->listpatient();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="../../tools/User/list_.css">
</head>
<body>
<section class="attendance">
        <div class="attendance-list">
          <h1>PATIENT List</h1>
          <table class="table">
            <thead>
              <tr>
              <th>id Patient</th>
                <th>CIN</th>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Genre</th>
                <th>Date_Birth</th>
                <th>Tel</th>
                <th>Adresse</th>
                <th>Mail</th>
                
              </tr>
            </thead>
        <tbody>
            <?php foreach ($tab as $patientt) : ?>
                <tr>
                    <td><?= $patientt['Id_patient'] ?></td>
                    <td><?= $patientt['cin'] ?></td>
                    <td><?= $patientt['nom'] ?></td>
                    <td><?= $patientt['prenom'] ?></td>
                    <td><?= $patientt['Genre'] ?></td>
                    <td><?= $patientt['Date_Birth'] ?></td>
                    <td><?= $patientt['tel'] ?></td>
                    <td><?= $patientt['adresse'] ?></td>
                    <td><?= $patientt['mail'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </section>
</body>
</html>
