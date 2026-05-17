<h2>Nemzeti parkok</h2>
<table border="1" style="width:100%; border-collapse: collapse;">
    <thead>
        <tr>
            <th>ID</th>
            <th>Név</th>
            <th>Műveletek</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($parkok as $row): ?>
            <tr>
            <td><?= $row['id'] ?></td>
<td><?= htmlspecialchars($row['nev']) ?></td>
<td style="white-space: nowrap;">
    <a href="?oldal=tablazat&edit_id=<?= $row['id'] ?>"
       style="display:inline-block;padding:5px 10px;background:#2d89ef;color:white;text-decoration:none;border-radius:4px;">
        Szerkesztés
    </a>

    <a href="?oldal=torol&id=<?= $row['id'] ?>"
       onclick="return confirm('Biztos törlöd?')"
       style="display:inline-block;padding:5px 10px;background:#e81123;color:white;text-decoration:none;border-radius:4px;margin-left:5px;">
        Törlés
    </a>
</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php if (isset($_GET['edit_id'])): ?>
  
    <?php 
     
        $edit_park = null;
        foreach($parkok as $p) {
            if($p['id'] == $_GET['edit_id']) { $edit_park = $p; break; }
        }
    ?>
    
    <?php if ($edit_park): ?>
        <h3>Park szerkesztése (ID: <?= $edit_park['id'] ?>)</h3>
        <form method="POST" action="?oldal=update&id=<?= $edit_park['id'] ?>">
            <input type="text" name="nev" value="<?= htmlspecialchars($edit_park['nev']) ?>" required>
            <button type="submit"
        style="display:inline-block;
               padding:6px 10px;
               background:#28a745;
               color:white;
               border:none;
               border-radius:4px;
               cursor:pointer;">
    Mentés
</button>
            <a href="?oldal=tablazat"
   style="display:inline-block;padding:4px 6px;background:#6c757d;color:white;text-decoration:none;border-radius:4px;margin-left:5px;">
   Mégse
</a>
        </form>
    <?php endif; ?>

<?php else: ?>

    <h3>Új park hozzáadása</h3>
    <form method="POST" action="?oldal=uj">
        <input type="text" name="nev" placeholder="Park neve" required>
        <button type="submit"
        style="padding:6px 10px;background:#28a745;color:white;border:none;border-radius:4px;cursor:pointer;">
    Hozzáadás
</button>
    </form>
<?php endif; ?>