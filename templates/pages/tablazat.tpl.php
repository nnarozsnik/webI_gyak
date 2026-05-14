<?php
$dbh = new PDO('mysql:host=localhost;dbname=gyakorlat7','root','');

$stmt = $dbh->query("SELECT * FROM np");

echo "<h2>Nemzeti parkok</h2>";
echo "<table border='1'>";
echo "<tr><th>ID</th><th>Név</th></tr>";

while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<tr>";
    echo "<td>".$row['id']."</td>";
    echo "<td>".$row['nev']."</td>";
    echo "</tr>";
}

echo "</table>";
?>