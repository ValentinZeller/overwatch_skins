<?php
require_once('../connect.php');
require_once('SeasonClass.php');
require_once('SeasonManager.php');
$db = ConnectBDD();
$manager = new SeasonManager($db);

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <title>Overwatch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../CSS/style.css" type="text/css"/> -->
</head>
<body>
<h2>Liste des saisons</h2>
<table class="table table-stripped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Date de début</th>
            <th>Date de fin</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $seasonData = $manager->getListeSeason();
        $seasonData->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($seasonData as $row) {
            echo "<tr>";
            foreach ($row as $value) {
                echo "<td>".$value."</td>";
            }
            echo "</tr>";
        }
        ?>
    </tbody>
</table>
</body>
</html>
</body>
</html>
