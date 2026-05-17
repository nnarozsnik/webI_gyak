<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['nev'])) {
    $stmt = $dbh->prepare("INSERT INTO np (nev) VALUES (?)");
    $stmt->execute([$_POST['nev']]);
}
header("Location: ./?oldal=tablazat");
exit;