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
<div class="container">
    <h1 >Admin</h1>
    <div class="d-flex justify-content-between align-items-center">
        <h2>Spelers</h2> 
        <a href="/admin/createplayer" class="btn btn-primary btn-lg" role="button">Create</a>
    </div>
    <div class="row" >
        <?php foreach ($spelerList as $speler): ?>
            <div class="col-md-4 mb-4">
                <div class="card border-success">
                    <div class="card-body">
                        <h2 class="card-title"><?= $speler->voornaam ?> <?= $speler->achternaam ?></h2>
                        <p class="card-text">Team: <?= $speler->team ?></p>
                        <p class="card-text">Geboortedatum: <?= $speler->geboortedatum ?></p>
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $speler->id ?>" />
                            <input type="checkbox" name="hiddenCheckbox" value="1" checked style="visibility: hidden;">
                            <button style="width: 300px" type="submit" class="btn btn-warning btn-block">Update</button>
                        </form>
                        <form method="POST">
                            <input name="id" value="<?= $speler->id ?>" style="display: none;" />
                            <input type="checkbox" name="hiddenCheckbox" value="0" checked style="visibility: hidden;">
                            <button style="width: 300px" type="submit" class="btn btn-danger btn-block">Delete</button>
                        </form> 
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


</body>
</html>