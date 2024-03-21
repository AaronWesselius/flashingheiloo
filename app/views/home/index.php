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
<div class="row">
<div class="col-5">
    <h2>news</h2>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <div>
        <div class="accordion" id="newsAccordion">
            <?php foreach ($nieuwsList as $index => $nieuws): ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading-<?= $index ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-<?= $index ?>" aria-expanded="false" aria-controls="collapse-<?= $index ?>">
                            <?= $nieuws->kop ?>
                        </button>
                    </h2>
                    <div id="collapse-<?= $index ?>" class="accordion-collapse collapse" aria-labelledby="heading-<?= $index ?>" data-bs-parent="#newsAccordion">
                        <div class="accordion-body">
                            <p><?= $nieuws->text ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<div class="col-1"></div>
<div class="col-5">
    <h2>Programma</h2>
    <div id="data-container">
        <table class="table" id="programma-table">
            <thead>
                <tr id="header-row"></tr>
            </thead>
            <tbody id="data-rows"></tbody>
        </table>
    </div>

    <script>
        fetch('http://localhost/api/programma')
        .then(result => result.json())
        .then((data) => {
            console.log('Output: ', data);
            const headerRow = document.getElementById('header-row');
            const dataRows = document.getElementById('data-rows');

            const headers = Object.keys(data[0]);
            headers.forEach(header => {
                const th = document.createElement('th');
                th.textContent = header;
                headerRow.appendChild(th);
            });

            data.forEach(item => {
                const row = document.createElement('tr');
                headers.forEach(header => {
                    const td = document.createElement('td');
                    td.textContent = item[header];
                    row.appendChild(td);
                });
                dataRows.appendChild(row);
            });
        }).catch(err => console.error(err));
    </script>

</div>


</body>
</html>