<?php

include "../../Controller/User/PatientC.php";

$patient = new PatientC();
$tab = $patient->listpatient();




if(isset($_POST['delete']))
{
    $id=$_POST['idToDelete'];
    $patient->deletepatient($id);
    header('Location:manage_patient.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Staff</title>
    <link rel="stylesheet" href="../../tools/User/list_.css">
</head>
<body>
<section class="attendance">
        <div class="attendance-list">
          <h1>Manage Patient</h1>
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
                <th>DELETE</th>
                <th>UPDATE</th>
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
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="idToDelete" value="<?= $patientt['Id_patient'] ?>">
                            <button type="submit" name="delete" class="delete-btn">Delete</button>
                        </form>
                    </td>
                    <td>
                        <form method="POST" action="../../View/User/update_patient.php">
                            <input type="hidden" name="idupdate" value="<?= $patientt['Id_patient'] ?>">
                            <button type="submit" name="update" class="update-btn">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
            </section>
</body>
</html>


