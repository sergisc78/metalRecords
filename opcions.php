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

    <div class="dropdown">
        <button type="button" class="btn btn-dark dropdown-toggle" id="sessio" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <?php echo " " . $_SESSION["email"]; ?><span class="caret"></span>
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="index.html">Exit</a>
            <!--al posar session_destroy(), dóna problemes, algunes coses deixen de funcionar bé-->
        </div>
        
    </div>
    <h1>Escull una opció</h1>


    <div class="opcions">
        <div class="row">
            <div class="mx-auto">
                <a href="insertar.html" type="button" id="BotoOpcions" class="btn btn-dark btn-lg">Introdueix un album</a>
                <a href="consulta.html" type="button" id="BotoOpcions" class="btn btn-dark btn-lg">Consulta albums</a>
            </div>
        </div>
    </div>

    <footer>
        Sergi Sánchez 2020 @Copyright
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src=" https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

</body>

</html>