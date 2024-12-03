<?php

include "../../Controller/User/StaffC.php";
include "../../Controller/User/AnnouncmentC.php";

$sender=$_GET['sender'];
$role_staff=$_GET['role_staff'];
echo $sender;
$announ = null;
$announC = new AnnouncementC();

if(isset($_POST['subb']))
{
    $announ=$_POST['send'];
    $announ = new Announcement(
        $sender,
        $_POST['send']
    );
    $announC->addAnnoun($announ);
    header("Location:announ_staff.php?staff_id=$sender&role_staff=$role_staff");
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
         body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
    }

    form {
        text-align: center;
        margin: 20px auto;
        max-width: 400px;
        background-color: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    table {
        width: 100%;
        margin-bottom: 15px;
    }

    td {
        padding: 8px;
    }

    input[type="text"],
    input[type="date"],
    textarea,
    select {
        width: 100%;
        padding: 8px;
        margin-bottom: 10px;
        box-sizing: border-box;
    }

    button[name="subb"] {
        background-color: #4CAF50;
        color: white;
        border: none;
        padding: 10px 20px;
        cursor: pointer;
        border-radius: 4px;
    }

    button[name="subb"]:hover {
        background-color: #45a049;
    }
    .staff_name
    {
        color: red;
    }   
    </style>
</head>
<body>
    <form action="" method="post">
        <table>
            
        <h2>New Announceement</h2>
        <tr>
            Announceement :
        </tr>

            <tr>
                <td>
                    <textarea name="send"></textarea>
                </td>
            </tr>
        </table>
        <button type="submit" name="subb">Send</button>
    </form>
</body>
</html>



