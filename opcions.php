<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MetalRecords</title>
</head>

<!--BOOTSTRAP CSS-->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

<!-- CSS FILE-->
<link rel="stylesheet" href="css/main.css" />

<!--GOOGLE FONTS-->
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />

<body>

    <?php

    session_start();

    if (!isset($_SESSION["email"])) {

        header("location:login.html");
    }

    ?>

    <h1>Escull una opció</h1>

    <div class="opcions">
        <div class="row">
            <div class="mx-auto">
                <button type="button" class="btn btn-dark btn-lg">Introdueix un album</button>
                <button type="button" class="btn btn-dark btn-lg">Consulta albums</button>
                <button type="button" class="btn btn-dark btn-lg">Modifica albums</button>
                <button type="button" class="btn btn-dark btn-lg">Esborra albums</button>
            </div>
        </div>
    </div>

    <footer>
        Sergi Sánchez 2020 @Copyright
    </footer>

</body>

</html>