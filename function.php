<?php

function template($filename, $data) {
    extract($data);
    ob_start();
    include $filename;
    return ob_get_clean();
}
function h($string) {
    return htmlspecialchars($string);
}

function randomColor($seed) {
    if ($seed) {
        mt_srand($seed+1);
    }
    $letters = '0123456789ABCDEF';
    $color = '#';
    for ($i = 0; $i < 6; $i++) {
        $color .= $letters[rand(0, 15)];
    }
    $color .= '40';
    return $color;
}

function split($count, $nbColumn) {
    $splitClass = "item lazy-background";
    $split = ceil($count/$nbColumn);
    switch($split) {
        case 2:
            $splitClass .= " half-column";
            break;
        case 3: case 4:
            $splitClass .= " half-column half-row";
            break;
        case 5: case 6: case 7: case 8:
            $splitClass .= " quarter-column half-row";
            break;
    }
    return $splitClass;
}

function getNbColumn($category, $maxSkinCategory) {
    return max(ceil($maxSkinCategory[$category['name']] / MAX_SKIN_AMOUNT), 1);
}

function renameFile($filename, $suffix = 'web') {
    $pathinfo = pathinfo($filename);
    return $pathinfo['dirname'] . '/' . $pathinfo['filename'] . '_' . $suffix . '.' . $pathinfo['extension'];
}

?>