<?php

include "../../Controller/User/StaffC.php";
include "../../Controller/User/PatientC.php";

try {


    $searchTerm =$_POST['rech'] ; 

    $sql = "SELECT Id_staff AS id, Nom AS name, 'staff' AS type FROM staff
            WHERE
                Id_staff LIKE :searchTerm OR
                cin LIKE :searchTerm OR
                Nom LIKE :searchTerm OR
                Prenom LIKE :searchTerm OR
                Genre LIKE :searchTerm OR
                Date_Birth LIKE :searchTerm OR
                E_mail LIKE :searchTerm OR
                tel LIKE :searchTerm OR
                Password_s LIKE :searchTerm OR
                Role LIKE :searchTerm
            UNION
            SELECT Id_patient AS id, nom AS name, 'patient' AS type FROM patient
            WHERE
                Id_patient LIKE :searchTerm OR
                cin LIKE :searchTerm OR
                nom LIKE :searchTerm OR
                prenom LIKE :searchTerm OR
                Date_Birth LIKE :searchTerm OR
                Genre LIKE :searchTerm OR
                tel LIKE :searchTerm OR
                Password LIKE :searchTerm OR
                adresse LIKE :searchTerm";

    $stmt = $db->prepare($sql);
    $stmt->bindParam(':searchTerm', $searchTerm, PDO::PARAM_STR);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
    
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="styles.css">
        <title>Search Results</title>
        <style>
.attendance{
  margin-top: 100px;
  text-transform: capitalize;
}
.attendance-list{
  width: 100%;
  padding: 10px;
  margin-top: 10px;

  border-radius: 10px;
  box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
}
.table{
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 15px;
  min-width: 80%;
  overflow: hidden;
  border-radius: 5px 5px 0 0;
}
table thead tr{
  color: #fff;
  background: #34AF6D;
  text-align: left;
  font-weight: bold;
}
.table th,
.table td{
  padding: 12px 15px;
}
.table tbody tr{
  border-bottom: 1px solid #ddd;
}
.table tbody tr:nth-of-type(odd){
  background: #f3f3f3;
}
.table tbody tr.active{
  font-weight: bold;
  color: #4AD489;
}
.table tbody tr:last-of-type{
  border-bottom: 2px solid #4AD489;
}

    </style>
    </head>
    <body>
    
    <div class="container">
    
        <h1>Search Results</h1>
    

        <section class="attendance">
        <div class="attendance-list">
            <?php if (!empty($results)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Type</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $result): ?>
                            <tr>
                                <td><?= $result['id'] ?></td>
                                <td><?= $result['name'] ?></td>
                                <td><?= $result['type'] ?></td>
                           
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No results found.</p>
            <?php endif; ?>
        </div>
        </section>
    
    </div>
    
    <div class="footer">
        &copy; 2023 Your Company Name
    </div>
    
    </body>
    </html>
    
<?php
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
