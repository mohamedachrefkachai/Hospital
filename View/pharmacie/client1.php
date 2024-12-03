
<?php
include "../../Controller/pharmacie/OrdonnanceC.php";
include "../../Model/pharmacie/ordonnance.php";

$ordonnanceC = new OrdonnanceC();

$id=$_GET['id'];
    
    $ordonnances = $ordonnanceC->searchordonnance($id);

    if (!empty($ordonnances)) {
        
        foreach ($ordonnances as $ordonnancee) {
            ?>
            <div style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px;">
                <h2>Ordonnance ID: <?php echo $ordonnancee['id_ordonnance']; ?></h2>
                <p><strong>Order Date:</strong> <?php echo $ordonnancee['date_ordonnance']; ?></p>
                <p><strong>ID Patient:</strong> <?php echo $ordonnancee['id_patient']; ?></p>
                <p><strong>ID Staff:</strong> <?php echo $ordonnancee['id_staff']; ?></p>

                <h3>Prescribed Medications:</h3>
                <ul>
                    <li><strong>ID Médicament:</strong> <?php echo $ordonnancee['id_medicament']; ?></li>
                    <li><strong>Number of Packages:</strong> <?php echo $ordonnancee['nb_packet']; ?></li>
                    <li><strong>Fréquency:</strong> <?php echo $ordonnancee['frequence']; ?></li>
                    <li><strong>Duration:</strong> <?php echo $ordonnancee['duree']; ?></li>
                    <?php if($ordonnancee['etat'] == 'non_commande'){  ?>
                        <li><div style='color:red'><strong>Etat:</strong> <?php echo $ordonnancee['etat']; ?></div></li>
                        <?php  }else{  ?>
                            <li><div style='color:green'><strong>Etat:</strong> <?php echo $ordonnancee['etat']; ?></div></li>
                            <?php  } ?>
                            <form method="get" action="exportorordpdf.php">
                    <input type="hidden" name="id" value="<?php echo $ordonnancee['id_ordonnance']; ?>">
                    <button type="submit">Export to PDF</button>
                </form>
                <?php if($ordonnancee['etat'] == 'non_commande'){  ?>             
                <form method="post" action="order.php">
                    <input type="hidden" name="id_ordonnance" value="<?php echo $ordonnancee['id_ordonnance']; ?>">
                    <button type="submit">order</button>
                    <?php  } ?>
                </form>
                </ul>

              
            </div>
            <?php
        }
    } else {
        echo "Pas de résultats pour ce patient.";
        echo '<script>alert("Pas de résultat pour ce patient.")</script>';
    }

?>
