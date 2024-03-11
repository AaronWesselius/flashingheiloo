<?php
include __DIR__ . '/../header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flashing Heiloo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <h1>Nieuws<h1>
    <div class="container">

            <?php foreach ($nieuwsList as $nieuws): ?>
                <div class="col-sm-4">
                    <div class="card border-success mb-3" style="max-width: 18rem;">
                        <div class="card-body">
                            <h2 class="card-title"><?= $nieuws->kop ?></h2>
                            <p class="card-text"><?= $nieuws->text ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

    </div>

</body>
</html>