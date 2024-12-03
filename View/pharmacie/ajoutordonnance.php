
<?php
include "../../Controller/pharmacie/OrdonnanceC.php";
include "../../Model/pharmacie/ordonnance.php";

include "../../Controller/pharmacie/medicamentC.php";
include "../../Model/pharmacie/medicament.php";


include "../../Controller/User/PatientC.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../vendor/autoload.php';
$patient = new PatientC();
$patient = $patient->listpatient();

$Medicament = new MedicamentC();
$tab = $Medicament->listmedicament();

$ordonnance = null;
$OrdonnanceC = new OrdonnanceC();

$n = $_GET["n"];

if (isset($_POST["ordonnance"])) {
    
    $id_ordonnance=$OrdonnanceC->getlastid();
    $id_ordonnance=intval ($id_ordonnance);
    $id_staff=$_GET['staff'];
    $idpatient = $_POST['idpat'];




    


    for ($i = 0; $i < $n; $i++) {
        $idmedicament = $_POST['medicament'][$i];
        $nb_packet = $_POST['nb_packet'][$i];
        $frequence = $_POST['frequence'][$i];
        $duree = $_POST['duree'][$i];
        $etat='non_commande';
        $date_ordonnance = date("Y-m-d");

        $ordonnance = new Ordonnance($id_ordonnance,$idmedicament, $nb_packet, $id_staff, $idpatient, $duree, $date_ordonnance,$frequence,$etat);
        $patient = new PatientC();
        $patientt=$patient->showPatient($idpatient);

        
        try {

            $OrdonnanceC->ajoutOrdonnance($ordonnance);
            $mail = new PHPMailer(true); 
            
            try {
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username='mohamedachref.kachai@esprit.tn'; 
                $mail->Password='wwqu xgrt raom wkwu';
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                
                // Recipients
                $mail->setFrom('MediCoeur_Team@example.com','MediCoeur Team');
                $mail->addAddress($patientt['mail']);
        
                // Content
                $mail->isHTML(true);
                $mail->Subject = 'Confirmation Ordonnace';
                $mail->Body    = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <title>Authorization Code</title>
                </head>
                <body style="font-family: Arial, sans-serif; padding: 20px;">
                        
                    <p>Vous Avez Recu Un Ordonnace</p>
                
                    <p>Thank you,<br>MediCoeur Team</p>
                </body>
                </html>
                ';
        
                $mail->send();
            } catch (Exception $e) {
                return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } catch (Exception $e) {
            echo "Erreur lors de l'ajout à la base de données : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout des Ordonnances</title>
    <style>
        body {
            font-family: Arial, sans-serif;

            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #555;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .error-message {
            color: red;
            margin-top: -8px;
            margin-bottom: 10px;
        }

        button {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
    
</head>
<body>

<h1>Ajout Ordonnance</h1>

<form method="post" onsubmit="return validateForm()">
    <label>Id Patient :</label>   
        <select name="idpat" id="">
        <?php foreach ($patient as $patientt) { ?>
            <option value="<?php echo $patientt['Id_patient']; ?>"><?php echo 'ID :'. $patientt['Id_patient'].'- Nom :'. $patientt['nom']; ?></option>
        <?php } ?>
        </select>
   
    <?php for ($i = 0; $i < $n; $i++) {$Medicament = new MedicamentC();  $tab = $Medicament->listmedicament();   //print_r($tab); echo $i; echo 'test';?>
    <label for="medication<?php echo $i; ?>">drugs<?php echo $i+1; ?>:</label>
    <select name="medicament[]">
        <?php foreach ($tab as $Medicament) { ?>
            <option value="<?php echo $Medicament['id_medicament']; ?>"><?php echo $Medicament['nom_medicament']; ?></option>
        <?php } ?>
    </select>
    


        <label>Number of packets:</label>
        <input type="number" id="nb_packet" name="nb_packet[]" >

        <label for="frequence<?php echo $i; ?>">Fréquecny:</label>
        <select id="frequence<?php echo $i; ?>" name="frequence[]">
            <option value="1">once a day  (1x/day)</option>
            <option value="2">twice a day (2x/day)</option>
            <option value="3">Three a day (3x/day)</option>
        </select>

        <label for="duree<?php echo $i; ?>">Duration of Treatment (in days):</label>
        <input type="number" id="duree" name="duree[]" min="1" >
    <?php } ?>
    <button type="submit" name="ordonnance">ADD</button>

    <?php
    $dateCourante = date("d-m-Y H:i:s");
    echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $dateCourante;
    ?>
</form>

<script>
    function validateForm() {
        var id = document.getElementById("idpat").value;
        if (id.trim() === '' || isNaN(id)) {
            alert("Erreur: Veuillez saisir un ID valide.");
            return false;
        }

        var nb_packets = document.getElementsByName("nb_packet[]");
        var durees = document.getElementsByName("duree[]");

        for (var i = 0; i < nb_packets.length; i++) {
            if (nb_packets[i].value.trim() === '' || durees[i].value.trim() === '' || nb_packets[i].value < 0 || durees[i].value < 0) {
                alert("Erreur: Veuillez remplir tous les champs avec des valeurs valides supérieures à 0.");
                return false;
            }
        }

        return true;
    }
</script>

</body>

</html>
