<?php
if (!isset($_SESSION['login'])) {
    die("Nincs jogosultság az üzenetekhez!");
}

$dbh = new PDO(
    'mysql:host=localhost;dbname=gyakorlat7;charset=utf8',
    'root',
    '',
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

$sql = "SELECT id, nev, email, uzenet, created_at 
        FROM uzenetek 
        ORDER BY created_at DESC";

$stmt = $dbh->query($sql);
$uzenetek = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Üzenetek</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>ID</th>
        <th>Név</th>
        <th>Email</th>
        <th>Üzenet</th>
        <th>Küldés ideje</th>
    </tr>

    <?php foreach ($uzenetek as $u): ?>
        <tr>
            <td><?= $u['id'] ?></td>

            <td>
                <?= htmlspecialchars($u['nev'] ?: "Vendég") ?>
            </td>

            <td>
                <?= htmlspecialchars($u['email']) ?>
            </td>

            <td>
                <?= htmlspecialchars($u['uzenet']) ?>
            </td>

            <td>
                <?= $u['created_at'] ?>
            </td>
        </tr>
    <?php endforeach; ?>
</table>