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
    <h1>Admin</h1>
    <div class="container text-center">
    <div class="row">
        <div class="col">
            <H2>Spelers</H2>
            <?php foreach ($spelerList as $speler): ?>
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h2 class="card-title"><?= $speler->voornaam ?></h2>
                        <p class="card-text"><?= $speler->achternaam ?></p>
                        <button class="btn btn-warning">Update</a>
                        <button class="btn btn-danger">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>                     
        </div>

        <div class="col">
            <H2>Nieuws</H2>
            <?php foreach ($nieuwsList as $nieuws): ?>
                <div class="card border-success mb-3" style="max-width: 18rem;">
                    <div class="card-body">
                        <h2 class="card-title"><?= $nieuws->kop ?></h2>
                        <p class="card-text"><?= $nieuws->text ?></p>
                        <button class="btn btn-warning">Update</a>
                        <button class="btn btn-danger">Delete</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    
  </div>
</div>

</body>
</html>