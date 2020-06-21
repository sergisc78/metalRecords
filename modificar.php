<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>metalRecords</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <!-- CSS FILE-->
    <link rel="stylesheet" href="css/main.css" />

    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />
</head>

<body>

    <?php

    include('connexio.php');

    $missatgeExit='L´album s´ha modificament correctament';
    $missatgeError = "Error el la modificació del album";

    

   /* $id = $_GET['id'];
    $band = $_GET['band'];
    $titol = $_GET['titol'];
    $any = $_GET['any'];*/


    if (isset($_POST['modificar'])) {

        $id = $_POST['id'];
        $banda = $_POST['banda'];
        $titol = $_POST['titol'];
        $any = $_POST['any'];

       

        $sql = "UPDATE albums SET nomBanda=:banda,titol=:titol,any=:any WHERE id=:id";

        $resultat = $connexio->prepare($sql);

        $resultat->execute(array(":id" => $id, ":banda" => $banda, ":titol" => $titol, ":any" => $any));

       if ($resultat) {

             
            echo "<h2>$missatgeExit</h2>";
            echo "<h3>Banda:  $banda</h3>";
            echo "<h3>Títol:  $titol</h3>";
            echo "<h3>Any:  $any</h3>";
            echo "<a href='opcions.php' type='button' class='btn btn-dark btn-lg>Menú</a>";
            echo "<footer>Sergi Sánchez 2020 @Copyright</footer>"; 
        } else {

            echo "<h1> $missatgeError<h1>";
            echo "<a href='consulta.php' type='button' class='btn btn-dark btn-lg'>Tornar</a>";
            echo "<footer>Sergi Sánchez 2020 @Copyright</footer>";
        } 
    }

    ?>

    <form action="" method="post">
        <h2>Modifica l´album</h2>
        <div class="form-group">
            <label for="banda">ID</label>
            <input type="text" class="form-control" id="id" name="id" readonly  value="<?php echo $_GET['id']; ?>" />
        </div>
        <div class="form-group">
            <label for="banda">Banda</label>
            <input type="text" class="form-control" id="banda" name="banda" value="<?php echo $_GET['band']; ?>" />
        </div>
        <div class="form-group">
            <label for="titol">Títol del disc</label>
            <input type="text" class="form-control" id="titol" name="titol" value="<?php echo $_GET['titol']; ?>" />
        </div>

        <div class=" form-group">
            <label for="text">Any de llançament</label>
            <input type="text" class="form-control" id="any" name="any" value="<?php echo $_GET['any']; ?>" />
        </div>

        <button type=" submit" class="btn btn-dark" name="modificar" id="enviar">Modifica</button>
    </form>

    <a href='opcions.php' type='button' class='btn btn-dark' style="margin-left: 590px;">Tornar</a>

    <footer>
        Sergi Sánchez 2020 @Copyright
    </footer>

    

    <!--BOOTSTRAP JS-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>

</html>