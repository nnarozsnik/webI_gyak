<?php
$dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7','root','');

$id = $_GET['id'];
$nev = $_POST['nev'] ?? '';

if ($id && $nev) {

    $stmt = $dbh->prepare("UPDATE np SET nev = ? WHERE id = ?");
    $stmt->execute([$nev, $id]);
}

header("Location: index.php?oldal=tablazat");
exit;
?>