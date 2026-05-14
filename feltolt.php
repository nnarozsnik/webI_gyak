<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$MAPPA = "kepek/";
$MAXMERET = 500 * 1024;
$MEDIATIPUSOK = ["image/jpeg", "image/png"];

$uzenet = [];


if(!isset($_SESSION['login'])) {
    die("Nincs jogosultság a feltöltéshez!");
}

if (isset($_POST["kuld"])) {

    foreach ($_FILES as $fajl) {

        if ($fajl["error"] == 4) continue;

        if (!in_array($fajl["type"], $MEDIATIPUSOK)) {
            $uzenet[] = "Hibás típus: " . $fajl["name"];
            continue;
        }

        if ($fajl["size"] > $MAXMERET) {
            $uzenet[] = "Túl nagy fájl: " . $fajl["name"];
            continue;
        }

        $cel = $MAPPA . strtolower($fajl["name"]);

        if (file_exists($cel)) {
            $uzenet[] = "Már létezik: " . $fajl["name"];
            continue;
        }

        if (move_uploaded_file($fajl["tmp_name"], $cel)) {
            $uzenet[] = "OK: " . $fajl["name"];
        } else {
            $uzenet[] = "Hiba feltöltés közben: " . $fajl["name"];
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Feltöltés</title>
</head>
<body>

<h1>Képfeltöltés eredménye</h1>

<?php
if (!empty($uzenet)) {
    echo "<ul>";
    foreach ($uzenet as $u) {
        echo "<li>$u</li>";
    }
    echo "</ul>";
}
?>

<p><a href="index.php?oldal=kepek">Vissza a galériához</a></p>

</body>
</html>