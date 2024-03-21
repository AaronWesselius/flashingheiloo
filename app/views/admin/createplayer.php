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
        <h1>Speler maken</h1>
        <a href="/admin/admin" class="btn btn-primary" role="button">Back</a>
    </div>
<form class="row g-3" method="POST"> 
 <div class="form-group">
    <label for="voornaam">Voornaam</label>
    <input type="text" class="form-control" id="voornaam" name="voornaam" placeholder="Voornaam">
 </div>
 <div class="form-group">
    <label for="achternaam">Achternaam</label>
    <input type="text" class="form-control" name="achternaam" id="achternaam" placeholder="Achternaam">
 </div>
 <div class="form-group">
    <label for="geboortedatum">Geboortedatum</label>
    <input type="date" class="form-control" name="geboortedatum" id="geboortedatum">
 </div>
 <div class="form-group">
    <label for="team">Team</label>
    <input type="text" class="form-control" id="team" name="team" placeholder="Team">
 </div>
 <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>