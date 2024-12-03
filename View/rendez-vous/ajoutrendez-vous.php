<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Importations nécessaires
include '../../Controller/rendez-vous/rendez-vousC.php';
include '../../Model/rendez-vous/rendez-vous.php';
include '../../Controller/rendez-vous/dateC.php';
include '../../Model/rendez-vous/date.php';

$rendezvous = null;
$rendezvousC = new rendezvousC();
$date = null;
$dateC = new dateC();

// Define the predefined specialties and doctors
$specialtiesAndDoctors = array(
    'generaliste' => array('Jalel', 'Amine'),
    'Cardiologie' => array('Achref', 'Youssef'),
    'Neurologie' => array('Najet', 'Farida'),
    'Psychiatrie' => array('Safe', 'Marwa'),
    'Endocrinologie' => array('Rim', 'Mohamed')
);

// Ajoutez cette vérification dans votre script PHP
// ...


if (isset($_POST["ajoutrendezvous"])) {
    $idpatient =$_GET['id'];
    $specialite = $_POST['specialite'];
    $nommedecin = $_POST['nommedecin'];
    $date = $_POST['date'];
    $heure = $_POST['heure'];
    $email = $_POST['email'];

    // Ajout de la vérification du nombre maximal de rendez-vous par jour
    $maxRdvParJour = 5; // Nombre maximal de rendez-vous par jour (à ajuster selon vos besoins)
    $nbRdvPourCeJour = $rendezvousC->getNbRdvPourMedecinEtDate($nommedecin, $date);
    $nbRdvPourCetteHeure = $rendezvousC->getNbRdvPourMedecinEtHeure($nommedecin, $heure);

    // Vérifier si la date a atteint le nombre maximal de rendez-vous
    if ($nbRdvPourCeJour < $maxRdvParJour) {
        // Vérifier si l'heure est disponible
        if ($nbRdvPourCetteHeure == 0) {
            // Ajout du rendez-vous dans la table "rendezvous"
            $rendezvous = new rendezvous($idpatient, $specialite, $nommedecin, $date, $heure, $email);
            $rendezvousC->ajoutrendez_vous($rendezvous);

            $date = new date($nommedecin, $date, $idpatient, $heure);
            $dateC->ajoutdate($date);
            $mail = new PHPMailer(true); 
            echo $email ;
            try {
                
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username='jalel.nasr@esprit.tn'; 
                $mail->Password='hqay igok ugla gjay';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                
                // Recipients
                $mail->setFrom('MediCoeur_Team@example.com','MediCoeur Team');
                $mail->addAddress($email);
        
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Confirmation Rendez-vous';
                $mail->Body    = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Authorization Code</title>
                </head>
                <body style="font-family: Arial, sans-serif; padding: 20px;">
                        
                    <p>Votre Rendez-vous a ete pris avec succes</p>
                
                    <p>Thank you,<br>MediCoeur Team</p>
                </body>
                </html>
                ';
        
                $mail->send();
            } catch (Exception $e) {
                return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
            


        } else {
            echo "<script>alert('L\'heure sélectionnée n\'est pas disponible. Veuillez choisir une autre heure.');</script>";
        }
        } else {
            echo "<script>alert('Le nombre maximal de rendez-vous pour ce médecin à cette date est atteint. Veuillez choisir une autre date.');</script>";
        }
        }
        

// ...


       // Envoi de l'e-mail de confirmation
/*
$mail = new PHPMailer(true); 
try {
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username='jalel.nasr@esprit.tn'; 
    $mail->Password='hqay igok ugla gjay';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    // Recipients
    $mail->setFrom('MediCoeur_Team@example.com','MediCoeur Team');
    $mail->addAddress($email);

    // Content
    $mail->isHTML(true);
    $mail->Subject = 'Confirmation Rendez-vous';
    $mail->Body    = 'Votre Rendez Vous a ete Confirme';

    $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
*/

   


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add rendez-vous</title>
    <link rel="stylesheet" href="../../tools/rendez_vous/style1.css">

    <style>
        .dark-mode {
  background-color: black;
  color: white;
}


        .container {
            width: 50%;
            margin: 0 auto;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input,
        select {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Add rendez-vous</h1>
        <form action="" method="post">

            <label for="specialite">Speciality:</label>
            <select id="specialite" name="specialite" onchange="updateDoctorsList()" required>
                <?php
                foreach ($specialtiesAndDoctors as $speciality => $doctors) {
                    echo "<option value=\"$speciality\">$speciality</option>";
                }
                ?>
            </select>

            <label for="nommedecin">Name of drugs:</label>
            <select id="nommedecin" name="nommedecin" required>
                
            </select>

            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>

            <label for="heure">Houre:</label>
            <input type="time" id="heure" name="heure" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <button type="submit" name="ajoutrendezvous">ADD</button>
        </form>
    </div>

    <script>
    // Function to update the list of doctors based on the selected specialty
    function updateDoctorsList() {
        var selectedSpeciality = document.getElementById('specialite').value;
        var specialtiesAndDoctors = <?php echo json_encode($specialtiesAndDoctors); ?>;

        // Get the list of doctors for the selected specialty
        var doctorsList = specialtiesAndDoctors[selectedSpeciality];

        // Update the "Nom du médecin" dropdown with the list of doctors
        var nomMedecinDropdown = document.getElementById('nommedecin');
        nomMedecinDropdown.innerHTML = '<option value="">Sélectionnez un médecin</option>';
        doctorsList.forEach(function (doctor) {
            nomMedecinDropdown.innerHTML += '<option value="' + doctor + '">' + doctor + '</option>';
        });
    }

    // Initial update when the page loads
    updateDoctorsList();

    // Function to filter doctors based on the selected specialty
    function filterDoctors() {
        var selectedSpeciality = document.getElementById('specialite').value;
        var nomMedecinDropdown = document.getElementById('nommedecin');
        var doctorsList = <?php echo json_encode($specialtiesAndDoctors); ?>[selectedSpeciality];

        // Remove doctors not in the selected specialty
        for (var i = nomMedecinDropdown.options.length - 1; i >= 0; i--) {
            var doctor = nomMedecinDropdown.options[i].value;
            if (doctorsList.indexOf(doctor) === -1) {
                nomMedecinDropdown.remove(i);
            }
        }

        // Add missing doctors for the selected specialty
        doctorsList.forEach(function (doctor) {
            if (!Array.from(nomMedecinDropdown.options).some(option => option.value === doctor)) {
                nomMedecinDropdown.innerHTML += '<option value="' + doctor + '">' + doctor + '</option>';
            }
        });
    }

    // Attach the function filterDoctors() to the change event of the "Specialité" dropdown
    document.getElementById('specialite').addEventListener('change', function () {
        filterDoctors();
    });

    function validateForm() {
        // ... (Votre code de validation existant)
    }

    // Attach the function validateForm() to the submit event of the form
    document.getElementById('ajoutrendezvousForm').addEventListener('submit', function (event) {
        if (!validateForm()) {
            event.preventDefault(); // Prevent form submission if validation fails
        }
    });
   
</script>
</body>

</html>
