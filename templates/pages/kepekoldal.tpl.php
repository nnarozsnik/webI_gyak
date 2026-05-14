<h1>Képgaléria</h1>

<?php
$kepek = scandir("kepek");

foreach ($kepek as $kep) {

    if ($kep == "." || $kep == "..") continue;

    echo "
    <a href='kepek/$kep' target='_blank'>
        <img src='kepek/$kep' width='200'>
    </a>
    ";
}



?>


<?php if(isset($_SESSION['login'])): ?>

<h2>Képek feltöltése</h2>

<form action="feltolt.php" method="post" enctype="multipart/form-data">
    <input type="file" name="elso">
    <input type="file" name="masodik">
    <input type="file" name="harmadik">
    <input type="submit" name="kuld" value="Feltöltés">
</form>

<?php else: ?>

<p>Be kell jelentkezned a képek feltöltéséhez!</p>

<?php endif; ?>