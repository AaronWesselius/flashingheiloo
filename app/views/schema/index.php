<?php
include __DIR__ . '/../header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h1>Wedstrijd schema</h1>
    <div class="container">
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
                        <input name="id" value="<?= $wedstrijd->id ?>" style="display: none;" />
                        </form> 
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</body>
</html>