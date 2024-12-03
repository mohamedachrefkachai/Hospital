<?php
include "../../Controller/dateC.php";
include "../../Model/date.php";

$date = new dateC();
$tab = $date->listdate();
?>

<center>
    <h1>List of dates</h1>
    <h2>
        <a href="add_date.php">date</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
        <th>Iddate</th>
        <th>nommedecin</th>
        <th>date</th>
        <th>idpatient</th>
        <th>houre</th>
        <th>update</th>
        <th>Delete</th>
        
    </tr>
<?php

foreach ($tab as $date) {
    
?>

        <tr>
            <td><?= $date['iddate']; ?></td>
            <td><?= $date['nommedecin']; ?></td>
            <td><?= $date['date']; ?></td>
            <td><?= $date['idpatient']; ?></td>
            <td><?= $date['heure']; ?></td>
            <td align="center">
                <form method="POST" action="modifdate.php">
                    <input type="hidden" name="modifdate" value="<?= $date['iddate']; ?>">
                    <input type="submit" name="update" value="Update">
                </form>
            </td>
            <td align="center">
                <form method="POST" action="suppdate.php">
                    <input type="hidden" name="delete" value="<?= $date['iddate']; ?>">
                    <input type="submit" name="suppdate" value="DELETE">
                </form>
            </td>
        </tr>
    <?php
}
    ?>
</table>



   