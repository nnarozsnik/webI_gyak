<?php
$dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7','root','');

$result = $dbh->query("SELECT * FROM np");

echo "<h2>Nemzeti parkok</h2>";

echo "<table border='1'>";
echo "<tr><th>ID</th><th>Név</th><th>Művelet</th></tr>";

while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>{$row['id']}</td>";
    echo "<td>{$row['nev']}</td>";
    echo "<td>
    <a href='index.php?edit={$row['id']}'>Szerkesztés</a> |
    <a href='index.php?torol={$row['id']}'>Törlés</a>
</td>";
    echo "</tr>";
}

echo "</table>";
?>

<h3>Új park</h3>

<form method="POST" action="index.php?oldal=uj">
    <input type="text" name="nev" required>
    <button type="submit">Hozzáadás</button>
</form>