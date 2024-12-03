<?php
include "../../Controller/User/StaffC.php";

$staff = new StaffC();
$tab = $staff->liststaff();
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
            <h1 style="color: red;">STAFF List</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>id STAFF</th>
                        <th>CIN</th>
                        <th>Nom</th>
                        <th>Prenom</th>
                        <th>Genre</th>
                        <th>Date_Birth</th>
                        <th>E_mail</th>
                        <th>Tel</th>
                        <th>Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tab as $stafff) : ?>
                        <tr>
                            <td><?= $stafff['Id_staff'] ?></td>
                            <td><?= $stafff['cin'] ?></td>
                            <td><?= $stafff['Nom'] ?></td>
                            <td><?= $stafff['Prenom'] ?></td>
                            <td><?= $stafff['Genre'] ?></td>
                            <td><?= $stafff['Date_Birth'] ?></td>
                            <td><?= $stafff['E_mail'] ?></td>
                            <td><?= $stafff['tel'] ?></td>
                            <td><?= $stafff['Role'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div class="download-link">
                <a href="generate_pdf_staff.php">Download Staff List as PDF</a>
            </div>
        </div>
    </section>
</body>

</html>
