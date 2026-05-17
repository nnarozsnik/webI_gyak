<?php


?>

<h2>Üzenet fogadva</h2>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = trim($_POST["email"] ?? "");
    $uzenet = trim($_POST["uzenet"] ?? "");

    if ($email == "" || $uzenet == "") {
        echo "<p style='color:red'>Minden mező kötelező!</p>";
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<p style='color:red'>Hibás email!</p>";
    }
    else {

        if (isset($_SESSION['login'])) {
            $nev = $_SESSION['csn'] . " " . $_SESSION['un'] . " (" . $_SESSION['login'] . ")";
        } else {
            $nev = "Vendég";
        }

        try {
            $dbh = new PDO(
                "mysql:host=localhost;dbname=gyakorlat7;charset=utf8",
                "root",
                "",
                [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
            );

            $stmt = $dbh->prepare("
                INSERT INTO uzenetek (nev, email, uzenet)
                VALUES (:nev, :email, :uzenet)
            ");

            $stmt->execute([
                ":nev" => $nev,
                ":email" => $email,
                ":uzenet" => $uzenet
            ]);

            echo "<p style='color:green'>Sikeresen elmentve!</p>";

        } catch (PDOException $e) {
            echo "<p style='color:red'>DB hiba: ".$e->getMessage()."</p>";
        }
    }
}
?>

<p>
    <a href="index.php?oldal=kapcsolat">
        Vissza
    </a>
</p>