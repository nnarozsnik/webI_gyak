<?php
$dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7','root','');

$stmt = $dbh->prepare("DELETE FROM np WHERE id = ?");
$stmt->execute([$_GET['id']]);

header("Location: index.php?tablazat");
exit;