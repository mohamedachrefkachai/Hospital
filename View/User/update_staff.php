<?php
include "../../Controller/User/StaffC.php";

$Staff=null;
$staffC=new StaffC();


$staff_id=$_GET['staff_id'];
echo $_GET['staff_id'];
if(isset($_POST['subb']))
{
    $Staff = new Staff(
        $_POST['cin'],
        $_POST['fname'],
        $_POST['pname'],
        $_POST['genre'],
        $_POST['date'],
        $_POST['email'],
        $_POST['tel'],
        $_POST['password'],
        $_POST['role']
    );
    $staffC->updateStaff($_POST['id'],$Staff);
    header("Location:manage_staff.php?staff_id=$staff_id");
}


if(isset($_POST['update']))
{

    $Staff=$staffC->showStaff($_POST['idupdate']);

echo '
<!DOCTYPE html>
    <html>
    <head>
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
        padding: 40px;
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
    input[type="password"] {
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
            <h2>Update Staff<div class="staff_name">'. $Staff['Nom'] .'  ' . $Staff['Prenom'] . '</div></h2>
            <input type="hidden" name="Id_pa" value="' . $Staff['Id_staff'] . '">
            <table>
                <tr>
                    <td>ID:</td>
                    <td>' . $Staff['Id_staff'] . '</td>
                    <td><input type="hidden" name="id" value="' . $Staff['Id_staff'] . '"></td>
                </tr>

                <tr>
                    <td>CIN:</td>
                    <td>' . $Staff['cin'] . '</td>
                    <td><input type="hidden" name="cin" value="' . $Staff['cin'] . '"></td>
                </tr>

                <tr>
                    <td>Name:</td>
                    <td>' . $Staff['Nom'] . '</td>
                    <td><input type="text" name="fname" value="' . $Staff['Nom'] . '"></td>
                </tr>

                <tr>
                    <td>Prenom:</td>
                    <td>' . $Staff['Prenom'] . '</td>
                    <td><input type="text" name="pname" value="' . $Staff['Prenom'] . '"></td>
                </tr>

                <tr>
                    <td>Genre:</td>
                    <td>' . $Staff['Genre'] . '</td>
                    <td><input type="hidden" name="genre" value="' . $Staff['Genre'] . '"></td>
                </tr>

                <tr>
                    <td>TEL:</td>
                    <td>' . $Staff['tel'] . '</td>
                    <td><input type="text" name="tel" value="' . $Staff['tel'] . '"></td>
                </tr>

                <tr>
                    <td>E-MAIL:</td>
                    <td>' . $Staff['E_mail'] . '</td>
                    <td><input type="text" name="email" value="' . $Staff['E_mail'] . '"></td>
                </tr>

                <tr>
                    <td>Date Birth:</td>
                    <td>' . $Staff['Date_Birth'] . '</td>
                    <td><input type="date" name="date" value="' . $Staff['Date_Birth'] . '"></td>
                </tr>

                <tr>
                    <td>Role:</td>
                    <td>' . $Staff['Role'] . '</td>
                    <td><input type="hidden" name="role" value="' . $Staff['Role'] . '"></td>
                </tr>

                <tr>
                    <td>Password:</td>
                    <td>******</td>
                    <td><input type="hidden" name="password" value="' . $Staff['Password_s'] . '"></td>
                </tr>
            </table>
            <button type="submit" name="subb">SUBMIT</button>
        </form>
    </body>
    </html>



';


}

?>






