<?php
$dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7','root','');

$id = $_GET['id'] ?? null;
$nev = $_POST['nev'] ?? null;

if (!$id || !$nev) {
    die("Hiányzó adat (id vagy nev)");
}

$stmt = $dbh->prepare("UPDATE np SET nev = ? WHERE id = ?");
$stmt->execute([$nev, $id]);

header("Location: index.php?tablazat");
exit;
?>