<?php

$band = $_POST['banda'];
$titol = $_POST['titol'];
$any = $_POST['any'];
$missatgeError="Registre ja introduït";


try {

    if (!isset($_POST['titol'])) {

        $connexio = new PDO("mysql:host=localhost;dbname=metalrecords", "root", "");

        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $connexio->exec("SET CHARACTER SET utf8");

        $sql = "INSERT INTO albums (nomBanda,titol, any) values (?,?,?)";

        $resultat = $connexio->prepare($sql);

        $resultat->execute(array($band, $titol, $any));

        header("refresh:15;url=opcions.php");
    } else {

        echo $missatgeError;
    }
} catch (Exception $e) {
    die("Error" . $e->getMessage());
    echo " Hi ha un error  a la línia" . $e->getLine();
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metal records</title>
    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <!-- CSS FILE-->
    <link rel="stylesheet" href="css/main.css" />

    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />

</head>

<body>

    <h1 style="text-align: center;margin-top:auto">L´album s´ha introduït correctament a la base de dades</h1>
    <h2 style="text-align: center;margin-top:auto">Has introduït el següent registre:</h2>
    <h3 style="text-align: center;margin-top:auto">Banda: <?php echo $band; ?></h3>
    <h3 style="text-align: center;margin-top:auto">Títol: <?php echo $titol; ?></h3>
    <h3 style="text-align: center;margin-top:auto">Any: <?php echo $any; ?></h3>
    <footer>
        Sergi Sánchez 2020 @Copyright
    </footer>

</body>

</html>