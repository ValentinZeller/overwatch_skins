<?php
require_once('../connect.php');
require_once('SkinClass.php');
require_once('SkinManager.php');
$db = ConnectBDD();
$manager = new SkinManager($db);

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
<h2>Skin List</h2>
<table class="table table-stripped">
    <thead>
        <tr>
            <th>Hero name</th>
            <th>Skin name</th>
            <th>Rarity</th>
            <th>Image URL</th>
            <th>Category name</th>
            <th>Year</th>
            <th>Season</th>
            <th>Condition name</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $skinData = $manager->getListeSkin();
        $skinData->setFetchMode(PDO::FETCH_ASSOC);

        foreach ($skinData as $row) {
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
