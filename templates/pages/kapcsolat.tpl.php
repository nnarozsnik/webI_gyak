<h2>Kapcsolat</h2>

<form id="kapcsolatForm" method="POST" action="index.php?kapcsolat_kuld">
    
    <label>Név:</label><br>
    <input type="text" name="nev" id="nev"><br><br>

    <label>Email:</label><br>
    <input type="text" name="email" id="email"><br><br>

    <label>Üzenet:</label><br>
    <textarea name="uzenet" id="uzenet"></textarea><br><br>

    <button type="submit">Küldés</button>
</form>

<div id="hiba" style="color:red;"></div>

<script>
document.getElementById("kapcsolatForm").addEventListener("submit", function(e) {

    let nev = document.getElementById("nev").value.trim();
    let email = document.getElementById("email").value.trim();
    let uzenet = document.getElementById("uzenet").value.trim();

    if (nev === "" || email === "" || uzenet === "") {
        e.preventDefault();
        document.getElementById("hiba").innerText = "Minden mezőt ki kell tölteni!";
        return;
    }

    if (!email.includes("@")) {
        e.preventDefault();
        document.getElementById("hiba").innerText = "Hibás email cím!";
    }

});
</script>