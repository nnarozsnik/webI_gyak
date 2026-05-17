<?php
if (isset($_GET['id'])) {
    $stmt = $dbh->prepare("DELETE FROM np WHERE id = ?");
    $stmt->execute([$_GET['id']]);
}
header("Location: ./?oldal=tablazat");
exit;