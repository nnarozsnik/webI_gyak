<h2>Üzenet fogadva</h2>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nev = $_POST["nev"] ?? "";
    $email = $_POST["email"] ?? "";
    $uzenet = $_POST["uzenet"] ?? "";

    if ($nev == "" || $email == "" || $uzenet == "") {
        echo "<p style='color:red'>Minden mező kötelező!</p>";
    }
    elseif (!str_contains($email, "@")) {
        echo "<p style='color:red'>Hibás email!</p>";
    }
    else {

        try {
            $dbh = new PDO(
                "mysql:host=localhost;dbname=gyakorlat7;charset=utf8",
                "root",
                ""
            );

            $sql = "INSERT INTO uzenetek (nev, email, uzenet)
                    VALUES (:nev, :email, :uzenet)";

            $stmt = $dbh->prepare($sql);
            $stmt->execute([
                ":nev" => $nev,
                ":email" => $email,
                ":uzenet" => $uzenet
            ]);

            echo "<p style='color:green'>Sikeresen elmentve az adatbázisba!</p>";

        } catch (PDOException $e) {
            echo "<p style='color:red'>DB hiba: " . $e->getMessage() . "</p>";
        }
    }
}
?>