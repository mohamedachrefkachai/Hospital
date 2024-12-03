<?php
include "../../Controller/User/StaffC.php";
include "../../Controller/User/AnnouncmentC.php";

$Staff = null;
$staffC = new StaffC();

$announ = new AnnouncementC();
$tab = $announ->listannoun();

$staff_re = $_GET['staff_id'];
$role = $_GET['role_staff'];

$Staff = $staffC->showStaff($staff_re);

if (isset($_POST['delete'])) {
    $announ->deletAnnoun($_POST['idToDelete']);
    header("Location:announ_staff.php?staff_id=$staff_re&role_staff=$role");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        a {
            display: block;
            margin-top: 20px;
            margin-left: auto;
            margin-right: auto;
            padding: 6px 20px;
            border-radius: 10px;
            cursor: pointer;
            background: transparent;
            border: 1px solid #4AD489;
            color: #4AD489;
            text-align: center;
            text-decoration: none;
            transition: background 0.5s, color 0.5s;
        }

        a:hover {
            background: #4AD489;
            color: #fff;
        }

        .attendance {
            margin-top: 100px;
            text-transform: capitalize;
        }

        .attendance-list {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 10px;
            box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .table {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 15px;
            min-width: 80%;
            overflow: hidden;
            border-radius: 5px 5px 0 0;
        }

        table thead tr {
            color: #fff;
            background: red;
            text-align: left;
            font-weight: bold;
        }

        .table th,
        .table td {
            padding: 12px 15px;
        }

        .table tbody tr {
            border-bottom: 1px solid #ddd;
            background: #f3f3f3;
        }

        .table tbody tr:nth-of-type(odd) {
            background: #f9f9f9;
        }

        .table tbody tr.active {
            font-weight: bold;
            color: red;
        }

        .table tbody tr:last-of-type {
            border-bottom: 2px solid red;
        }

        .table button {
            padding: 6px 20px;
            border-radius: 10px;
            cursor: pointer;
            background: transparent;
            border: 1px solid #4AD489;
            transition: background 0.5s, color 0.5s;
        }

        .table button:hover {
            background: #4AD489;
            color: #fff;
        }
    </style>
</head>

<body>
    <?php if ($role == 'Administrator') { ?>
        <a href="new_announ.php?sender=<?= $staff_re ?>&role_staff=<?= $role ?>" name="chat">New Announcement</a>
    <?php } ?>
    <section class="attendance">
        <div class="attendance-list">
            <h1 style="color:red">Announcement</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>Admin :</th>
                        <th>Announcement content</th>
                        <th>TIME Announcement</th>
                        <th>DELETE Announcement</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($tab as $announ) { ?>
                        <tr>
                            <td><?php $Staff = $staffC->showStaff($announ['id_staff']);
                                echo $Staff['Nom'] ?></td>

                            <td><?= $announ['announcement_content'] ?></td>
                            <td><?= $announ['timestamp'] ?></td>
                            <?php if ($role == 'Administrator') { ?>
                                <td>
                                    <form method="POST" action="">
                                        <input type="hidden" name="idToDelete" value="<?= $announ['id_announcement'] ?>">
                                        <button type="submit" name="delete" class="delete-btn">Delete</button>
                                    </form>
                                </td>
                            <?php }; ?>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
    </section>
</body>

</html>
