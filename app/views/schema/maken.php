<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maken</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
    <div class="d-flex justify-content-between align-items-center">
        <h1>Wedstrijd maken</h1>
        <a type="button" class="btn btn-primary btn-lg" href="/schema/">terug</a>
    </div>

    <div class="container mx-auto p-3">
        <form class="row g-3 border" method="POST">       
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Thuis team</label>
                <input type="text" class="form-control" id="thuisTeam" name="thuisTeam" placeholder="Flashing Heiloo MSE1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Uit team</label>
                <input type="text" class="form-control" id="uitTeam" name="uitTeam" placeholder="MBCA MSE1">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Schijdsrechter 1</label>
                <select class="form-select" id="schijdsrechter1" name="schijdsrechter1" aria-label="Floating label select example">
                    <option value="0">---Speler---</option>
                    <?php foreach ($spelers as $speler): ?>  
                        <option value="<?= $speler->id ?>">[<?= $speler->team ?>] <?= $speler->voornaam ?> <?= $speler->achternaam ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Schijdsrechter 2</label>
                <select class="form-select" id="schijdsrechter2" name="schijdsrechter2" aria-label="Floating label select example">
                    <option value="0">---Speler---</option>
                    <?php foreach ($spelers as $speler): ?>  
                        <option value="<?= $speler->id ?>">[<?= $speler->team ?>] <?= $speler->voornaam ?> <?= $speler->achternaam ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tafel 1</label>
                <select class="form-select" id="tafel1" name="tafel1" aria-label="Floating label select example">
                    <option value="0">---Speler---</option>
                    <?php foreach ($spelers as $speler): ?>  
                        <option value="<?= $speler->id ?>">[<?= $speler->team ?>] <?= $speler->voornaam ?> <?= $speler->achternaam ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tafel 2</label>
                <select name="tafel2" class="form-select" id="tafel2" aria-label="Floating label select example">
                    <option value="0">---Speler---</option>
                    <?php foreach ($spelers as $speler): ?>  
                        <option value="<?= $speler->id ?>">[<?= $speler->team ?>] <?= $speler->voornaam ?> <?= $speler->achternaam ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Datum</label>
                <input type="date" id="datum" name="datum">       
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>    
        </form>
    </div>
</body>

</html>