<?php
include "../../Controller/rendez-vous/rendez-vousC.php";
include "../../Model/rendez-vous/rendez-vous.php";

$rendezvous = new rendezvousC();
$tab = $rendezvous->listrendez_vous();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../tools/parapharmacie/style2.css">
    <title>List of appointments</title>
</head>

<body>
    <center>
        <h1>List of appointments</h1>
    
    </center>
<center>
    <form method="POST" action="../../View/rendez-vous/listpdf.php"  class="a">
        <input type="hidden" name="export_pdf" value="1">
        <input type="submit" name="export_pdf_button" value="Export to PDF">
    </form>
</center>

    <table border="1" align="center" width="70%" class="table">
        <tr>
            <th>Idrendez-vous</th>
            <th>idpatient</th>
            <th>speciality</th>
            <th>doctorname</th>
            <th>date</th>
            <th>houre</th>
            <th>email</th>
            <th>update</th>
            <th>Delete</th>
        </tr>

        <?php
        foreach ($tab as $consultation) {
        ?>
            <tr>
                <td><?= $consultation['idrendezvous']; ?></td>
                <td><?= $consultation['idpatient']; ?></td>
                <td><?= $consultation['specialite']; ?></td>
                <td><?= $consultation['nommedecin']; ?></td>
                <td><?= $consultation['daterendezvous']; ?></td>
                <td><?= $consultation['heure']; ?></td>
                <td><?= $consultation['email']; ?></td>
                <td align="center">
                    <form method="POST" action="../../View/rendez-vous/modifrendez-vous.php">
                        <input type="hidden" name="modifrendezvous" value="<?= $consultation['idrendezvous']; ?>">
                        <input type="submit" name="update" value="Update">
                    </form>
                </td>
                <td align="center">
                    <form method="POST" action="../../View/rendez-vous/supprendez-vous.php">
                        <input type="hidden" name="delete" value="<?= $consultation['idrendezvous']; ?>">
                        <input type="submit" name="supprendez-vous" value="DELETE">
                    </form>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>


   