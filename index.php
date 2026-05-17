<?php
session_start();
include('./includes/config.inc.php');


try {
    $dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7', 'root', '',
                  array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
} catch (PDOException $e) {
    die("DB hiba: " . $e->getMessage());
}


$oldal = '/'; 
if (isset($_GET['oldal'])) {
    $oldal = $_GET['oldal'];
} else {
  
    $keresett_kulcsok = array_keys($_GET);
    if (!empty($keresett_kulcsok)) {
        $oldal = $keresett_kulcsok[0];
    }
}


switch ($oldal) {
    case 'uj':
        include("./logicals/uj.php");
        exit;
    case 'torol':
        include("./logicals/torol.php");
        exit;
    case 'update':
        include("./logicals/update.php");
        exit;
}


if ($oldal == 'tablazat') {
    $parkok = $dbh->query("SELECT * FROM np")->fetchAll(PDO::FETCH_ASSOC);
}
if ($oldal == 'edit' && isset($_GET['id'])) {
    $stmt = $dbh->prepare("SELECT * FROM np WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $szerkesztendo_park = $stmt->fetch(PDO::FETCH_ASSOC);
}


if (isset($oldalak[$oldal])) {
    $keres = $oldalak[$oldal];
} else {
    $keres = $oldalak['/'];
}


include('./templates/index.tpl.php');
?>