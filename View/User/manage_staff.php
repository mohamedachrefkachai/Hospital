<?php

include "../../Controller/User/StaffC.php";

$staff = new StaffC();

$staff_id=$_GET['staff_id'];
$tab=$staff->liststaff_except($staff_id);
/*$tab = $staff->liststaff();*/
if(isset($_POST['delete']))
{
    $id=$_POST['idToDelete'];
    $staff->deletestaff($id);
    header("Location: manage_staff.php?staff_id=$staff_id");
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
          <h1>Manage STAFF</h1>
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
                <th>DELETE</th>
                <th>UPDATE</th>
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
                    <td>
                        <form method="POST" action="">
                            <input type="hidden" name="idToDelete" value="<?= $stafff['Id_staff'] ?>">
                            <button type="submit" name="delete" class="delete-btn">Delete</button>
                        </form>
                    </td>
                    <td>
                    <form action="../../View/User/update_staff.php?staff_id=<?php echo $staff_id; ?>" method="post">
                            <input type="hidden" name="idupdate" value="<?= $stafff['Id_staff'] ?>">
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



