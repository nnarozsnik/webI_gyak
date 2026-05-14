<?php
include('./includes/config.inc.php');

$oldal = $_SERVER['QUERY_STRING'];

$id = null;

if (strpos($oldal, '=') !== false) {
    $tmp = explode('=', $oldal);
    $oldal = $tmp[0];
    $id = $tmp[1];
    $_GET['id'] = $id;
}


if ($oldal == "uj") {
    include("./logicals/uj.php");
    exit;
}

if ($oldal == "torol") {
    include("./logicals/torol.php");
    exit;
}

if ($oldal == "edit") {
    include("./logicals/edit.php");
    exit;
}
if ($oldal == "update") {
    include("./logicals/update.php");
    exit;
}


if ($oldal != "") {
    if (isset($oldalak[$oldal]) && file_exists("./templates/pages/{$oldalak[$oldal]['fajl']}.tpl.php")) {
        $keres = $oldalak[$oldal];
    } else {
        $keres = $hiba_oldal;
        header("HTTP/1.0 404 Not Found");
    }
} else {
    $keres = $oldalak['/'];
}


include('./templates/index.tpl.php');
?>