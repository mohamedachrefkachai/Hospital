<?php
include "../../config.php"; // Update with the correct path to your config file
$db = config::getConnexion();

// Define an associative array to store role counts and their respective colors
$roleColors = array(
    'Administrator' => '#3498db', // Blue
    'Medecin' => '#e74c3c', // Red
    'Infermiére' => '#2ecc71', // Green
    'Assistant' => '#f39c12', // Yellow
    'Pharmacien' => '#9b59b6' // Purple
);

$roleCounts = array(
    'Administrator' => 0,
    'Medecin' => 0,
    'Infermiére' => 0,
    'Assistant' => 0,
    'Pharmacien' => 0
);

// Query to retrieve the count of staff in each role
$stmt = $db->query("SELECT Role, COUNT(*) as count FROM staff GROUP BY Role");

// Populate the roleCounts array with the results
$totalCount = 0; // Variable to store the total staff count
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $role = $row['Role'];
    $count = $row['count'];
    $roleCounts[$role] = $count;
    $totalCount += $count; // Increment the total count
}

// Calculate the overall percentage
$overallPercentage = ($totalCount > 0) ? ($roleCounts[$role] / $totalCount) * 100 : 0;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .progress-container {
            position: relative;
            width: 200px;
            height: 200px;
        }

        .progress-circle {
            position: absolute;
            width: 100%;
            height: 100%;
            clip: rect(0, 200px, 200px, 100px);
            border-radius: 50%;
            background-color: #ecf0f1; /* Default color */
        }

        .progress-bar {
            position: absolute;
            width: 100%;
            height: 100%;
            clip: rect(0, 100px, 200px, 0);
            border-radius: 50%;
            background-color: <?php echo $roleColors['Medecin']; ?>; /* Change to default color */
            transform: rotate(<?php echo $overallPercentage * 3.6; ?>deg);
            transform-origin: center;
        }

        .percentage {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 24px;
            color: #333;
        }

        ul {
            text-align: center;
            list-style: none;
            padding: 0;
        }

        li {
            margin-bottom: 10px;
            color: <?php echo $roleColors['Medecin']; ?>; /* Change to default color */
        }
    </style>
</head>
<body>

<div class="progress-container">
    <div class="progress-circle"></div>
    <div class="progress-bar"></div>
    <div class="percentage"><?php echo round($overallPercentage) . '%'; ?></div>
</div>

<ul>
    <?php foreach ($roleCounts as $role => $count): ?>
        <?php $percentage = ($totalCount > 0) ? ($count / $totalCount) * 100 : 0; ?>
        <li style="color: <?php echo $roleColors[$role]; ?>"><?php echo "$role: $count (" . round($percentage) . "%)"; ?></li>
    <?php endforeach; ?>
</ul>

</body>
</html>
