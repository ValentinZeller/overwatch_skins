<?php
require_once('function.php');

$id = $_GET['id'] ?? null;
if ($id === null) {
    echo "<div>No category ID provided : <a href='index.php'>Return to homepage</a></div>";
    exit;
}

echo template('template/main.php', [
    'version' => 'category',
    'id_category' => $id
]);

?>