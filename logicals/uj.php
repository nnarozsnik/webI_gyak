<?php
$dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7','root','');

if (isset($_POST['nev'])) {
    $stmt = $dbh->prepare("INSERT INTO np (nev) VALUES (:nev)");
    $stmt->execute([':nev' => $_POST['nev']]);
}

header("Location: index.php?oldal=tablazat");
exit;