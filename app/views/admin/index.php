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

<div class="container vh-100 d-flex justify-content-center align-items-center mt-1">
    <form class="row g-3" method="POST">       
        <div class="mb-4">
            <label class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="wachtwoord" name="wachtwoord" placeholder="wachtwoord">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>           
    </form>
</div>


</body>
</html>