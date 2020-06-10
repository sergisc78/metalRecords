<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Metal Records</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <!-- CSS FILE-->
    <link rel="stylesheet" href="css/main.css" />

    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />

</head>

<body>

    <?php


    $buscar = $_GET['banda'];
    $missatgeError = "No hi ha cap registre introduït que coincideixi amb aquest nom";

    try {

        $connexio = new PDO("mysql:host=localhost;dbname=metalrecords", "root", "");

        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $connexio->exec("SET CHARACTER SET utf8");

        $sql = "SELECT nomBanda, titol, any FROM albums WHERE nomBanda=?";

        $resultat = $connexio->prepare($sql);

        $resultat->execute(array($buscar));

        $bandesInsertades = $resultat->rowCount();

        if ($bandesInsertades != 0) {

            /* while ($registre = $resultat->fetch(PDO::FETCH_ASSOC)) {

            echo " Banda: " . $registre['nomBanda'];
            echo " Títol " . $registre['titol'];
            echo  "Any:" . $registre['any'] . "<br>";
        }*/



            foreach ($resultat as $resultats) {

                echo " Banda:" . $resultats['nomBanda'] . " Títol " . $resultats['titol'] . " Any " . $resultats['any'];
            }

            echo "<br>";

            $resultat->closeCursor();
        } else {
            echo "<h1> $missatgeError<h1>";
            echo "<a href='consulta.html' type='button' class='btn btn-dark btn-lg'>Tornar</a>";
            echo "<footer>Sergi Sánchez 2020 @Copyright</footer>";
        }
    } catch (Exception $e) {

        die("Error" . $e->getMessage());
        echo " Hi ha un error  a la línia" . $e->getLine();
    }

    ?>



</body>

</html>