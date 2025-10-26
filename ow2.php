<?php
require_once('function.php');

echo template('template/main.php', [
    'version' => 'ow2',
    'link' => 'ow1',
    'linkText' => 'Overwatch 1',
]);

?>