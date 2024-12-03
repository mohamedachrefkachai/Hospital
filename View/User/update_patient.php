<?php

include "../../Controller/User/PatientC.php";

$patientC= new PatientC();
$patient=null;


if(isset($_POST['subb']))
{
    echo $_POST['mail'];
    $patient = new Patient(
        $_POST['cin'],
        $_POST['fname'],
        $_POST['pname'],
        $_POST['date'],
        $_POST['genre'],
        $_POST['tel'],
        $_POST['password'],
        $_POST['adresse'],
        $_POST['mail']
    );
    $patientC->updatePatient($_POST['id'],$patient);

    header('Location:manage_patient.php');
}

if(isset($_POST['update']))
{
    $patient=$patientC->showPatient($_POST['idupdate']);

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
    .patient_name
    {
        color: red;
    }
</style>
    
    </head>
    <body>
        <form action="" method="post">
            <h2>Update patient<div class="patient_name">'. $patient['nom'] .'  ' . $patient['prenom'] . '</div></h2>
            <input type="hidden" name="Id_pa" value="' . $patient['Id_patient'] . '">
            <table>
                <tr>
                    <td>ID:</td>
                    <td>' . $patient['Id_patient'] . '</td>
                    <td><input type="hidden" name="id" value="' . $patient['Id_patient'] . '"></td>
                </tr>

                <tr>
                    <td>CIN:</td>
                    <td>' . $patient['cin'] . '</td>
                    <td><input type="hidden" name="cin" value="' . $patient['cin'] . '"></td>
                </tr>

                <tr>
                    <td>Name:</td>
                    <td>' . $patient['nom'] . '</td>
                    <td><input type="text" name="fname" value="' . $patient['nom'] . '"></td>
                </tr>

                <tr>
                    <td>Prenom:</td>
                    <td>' . $patient['prenom'] . '</td>
                    <td><input type="text" name="pname" value="' . $patient['prenom'] . '"></td>
                </tr>

                <tr>
                    <td>Genre:</td>
                    <td>' . $patient['Genre'] . '</td>
                    <td><input type="hidden" name="genre" value="' . $patient['Genre'] . '"></td>
                </tr>

                <tr>
                    <td>TEL:</td>
                    <td>' . $patient['tel'] . '</td>
                    <td><input type="text" name="tel" value="' . $patient['tel'] . '"></td>
                </tr>

                <tr>
                    <td>Date Birth:</td>
                    <td>' . $patient['Date_Birth'] . '</td>
                    <td><input type="date" name="date" value="' . $patient['Date_Birth'] . '"></td>
                </tr>

                <tr>
                    <td>Adresse:</td>
                    <td>' . $patient['adresse'] . '</td>
                    <td><input type="text" name="adresse" value="' . $patient['adresse'] . '"></td>
                </tr>

                <tr>
                <td>Mail:</td>
                <td>' . $patient['mail'] . '</td>
                <td><input type="text" name="mail" value="' . $patient['mail'] . '"></td>
            </tr>

                <tr>
                    <td>Password:</td>
                    <td>******</td>
                    <td><input type="hidden" name="password" value="' . $patient['Password'] . '"></td>
                </tr>
            </table>
            <button type="submit" name="subb">SUBMIT</button>
        </form>
    </body>
    </html>



';


}