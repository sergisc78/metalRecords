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

        $sql = "SELECT id,nomBanda, titol, any FROM albums WHERE nomBanda=?";

        $resultat = $connexio->prepare($sql);

        $resultat->execute(array($buscar));

        $bandesInsertades = $resultat->rowCount();


        if ($bandesInsertades != 0) {

            /* while ($registre = $resultat->fetch(PDO::FETCH_ASSOC)) {

            echo " Banda: " . $registre['nomBanda'];
            echo " Títol " . $registre['titol'];
            echo  "Any:" . $registre['any'] . "<br>";
        }*/

            echo "<table>";
            echo "<tr><th>Registre</th><th>ID</th><th>Banda</th><th>Títol</th><th>Any</th>";
            $i = 0;

            foreach ($resultat as $resultats) {
                $i++;
                echo "<tr><td>" . $i . "</td>
                <td>" . $resultats['id'] . " </td>
                <td>" . $resultats['nomBanda'] . " </td>
                <td>" . $resultats['titol'] . "</td>
                <td>" . $resultats['any'] . "</td>
                <td><a href='modificar.php?id=$resultats[id] & band=$resultats[nomBanda] & titol=$resultats[titol] & any=$resultats[any]' type='button' class='btn btn-dark btn-sm'>Modificar</a></td>
                <td><a href='esborrar.php?id=$resultats[id] & band=$resultats[nomBanda] & titol=$resultats[titol] & any=$resultats[any]'  type='button' class='btn btn-dark btn-sm'>Esborrar</a></td></tr>";

               

                // echo " Banda:" . $resultats['nomBanda'] . " Títol " . $resultats['titol'] . " Any " . $resultats['any'];
            }
    
            $resultat->closeCursor();
            echo "<a href='consulta.html' type='button' class='btn btn-dark' style='margin-right:10px;float:right;'>Tornar</a>";
            
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