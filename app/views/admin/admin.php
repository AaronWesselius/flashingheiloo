<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<?php
include __DIR__ . '/../header.php';
?>
<div class="row">
  <div class="col-2">
    <div id="list-example" class="list-group">
      <a class="list-group-item list-group-item-action" href="#list-item-1">Accounts</a>
      <a class="list-group-item list-group-item-action" href="#list-item-2">WedstrijdSchema</a>
    </div>
  </div>
  <div class="col-8">
    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
    <div class="container">
    <h1 >Admin</h1>
    <div class="d-flex justify-content-between align-items-center">
        <h2>Spelers</h2> 
        <a href="/admin/createplayer" class="btn btn-primary btn-lg" role="button">Speler maken</a>
    </div>
        <div class="row" id="list-item-1" >
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
            <div class="container" id="list-item-2">
            <div class="d-flex justify-content-between align-items-center">
                <h2>WedstrijdSchema</h2> 
                <a type="button" class="btn btn-primary" href="/admin/wedstrijdschema">Wedstrijd maken</a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Thuis team</th>
                        <th scope="col">Uit team</th>
                        <th scope="col">Datum</th>
                        <th scope="col">Scheidsrechter 1</th>
                        <th scope="col">Scheidsrechter 2</th>
                        <th scope="col">Tafel 1</th>
                        <th scope="col">Tafel 2</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($wedstrijden as $wedstrijd): ?>
                        <tr>
                            <td><?= $wedstrijd->team1 ?></td>
                            <td><?= $wedstrijd->team2 ?></td>
                            <td><?= $wedstrijd->datum ?></td>
                            <td>[<?= $wedstrijd->schijdsrechter1->team ?>] <?= $wedstrijd->schijdsrechter1->voornaam ?> <?= $wedstrijd->schijdsrechter1->achternaam?></td>
                            <td>[<?= $wedstrijd->schijdsrechter2->team ?>] <?= $wedstrijd->schijdsrechter2->voornaam ?> <?= $wedstrijd->schijdsrechter2->achternaam?></td>
                            <td>[<?= $wedstrijd->tafel1->team ?>] <?= $wedstrijd->tafel1->voornaam ?> <?= $wedstrijd->tafel1->achternaam?></td>
                            <td>[<?= $wedstrijd->tafel2->team ?>] <?= $wedstrijd->tafel2->voornaam ?> <?= $wedstrijd->tafel2->achternaam?></td>
                            <form method="POST">
                                <input type="checkbox" name="hiddenCheckbox" value="2" checked style="visibility: hidden;">
                                <input name="id" value="<?= $wedstrijd->id ?>" style="display: none;" />
                            <td><button type="submit" class="btn btn-danger">Delete</button></td>
                            </form> 
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>
  </div>
</div>

</body>
</html>