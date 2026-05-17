<?php
$dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7','root','');

$id = $_GET['id'];

$stmt = $dbh->prepare("SELECT * FROM np WHERE id = ?");
$stmt->execute([$id]);
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<h2>Szerkesztés</h2>

<form method="POST" action="index.php?oldal=update&id=<?= $id ?>">
    <input type="text" name="nev" value="<?= $row['nev'] ?>">
    <button type="submit">Mentés</button>
</form>