<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>

<?php
include __DIR__ . '/../header.php';
?>
<div class="d-flex justify-content-between align-items-center">
        <h1>Speler Updaten</h1>
        <a href="/admin/admin" class="btn btn-primary" role="button">Back</a>
</div>
<form class="row g-3" method="POST"> 
    <div class="form-group">
        <label for="voornaam">Voornaam</label>
        <input type="text" value="<?= $speler->voornaam ?>" name="voornaam" class="form-control" id="voornaam" placeholder="Voornaam">
    </div>
    <div class="form-group">
        <label for="achternaam">Achternaam</label>
        <input type="text" value="<?= $speler->achternaam ?>" name="achternaam" class="form-control" id="achternaam" placeholder="Achternaam">
    </div>
    <div class="form-group">
        <label for="geboortedatum">Geboortedatum</label>
        <input type="date" value="<?= $speler->geboortedatum ?>" name="geboortedatum" class="form-control" id="geboortedatum">
    </div>
    <div class="form-group">
        <label for="team">Team</label>
        <input type="text" value="<?= $speler->team ?>" name="team" class="form-control" id="team" placeholder="Team">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<a href="/admin/admin" class="btn btn-primary" role="button">Back</a>

</body>
</html>