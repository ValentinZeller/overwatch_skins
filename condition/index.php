<?php
require_once('../connect.php');
require_once('ConditionClass.php');
require_once('ConditionManager.php');
$db = ConnectBDD();
$manager = new ConditionManager($db);

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
<h2>Liste des conditions</h2>
<table class="table table-stripped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $conditionData = $manager->getListeCondition();
        $conditionData->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($conditionData as $row) {
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
