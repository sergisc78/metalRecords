<?php

$mail = $_POST["email"];
$password = $_POST["password"];
$confirmarPass = $_POST["confirmarPass"];

/*$pass_xifrat=password_hash($password,PASSWORD_DEFAULT);
    $confirmPass_xifrat=password_hash($confirmarPass,PASSWORD_DEFAULT);*/



try {


    $connexio = new PDO("mysql:host=localhost;dbname=metalrecords", "root", "");

    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connexio->exec("SET CHARACTER SET utf8");

    $sql = "INSERT INTO users (email,password,confirmarPass) values(:mail,:password,:confirmarPass)";

    $resultat = $connexio->prepare($sql);

    $resultat->execute(array(":mail" => $mail, ":password" => $password, ":confirmarPass" => $confirmarPass));

    header("refresh:15;url=opcions.php");

    $resultat->closeCursor();
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
    <title>Document</title>

    <!--BOOTSTRAP CSS-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous" />

    <!-- CSS FILE-->
    <link rel="stylesheet" href="css/main.css" />

    <!--GOOGLE FONTS-->
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet" />
</head>

<body>

    <h1 style="text-align: center;margin-top:auto;">Benvingut / Benvinguda <?php echo $mail; ?> . T´has donat d´alta correctament.En breu et redigirem a la plana de login</h1>

    <footer>
        Sergi Sánchez 2020 @Copyright
    </footer>
</body>

</html>