
<?php


try {
    $connexio = new PDO("mysql:host=localhost;dbname=metalrecords", "root", "");

    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connexio->exec("SET CHARACTER SET utf8");

    $sql = "SELECT * FROM users WHERE email= ? AND password= ?";

    $resultat = $connexio->prepare($sql);

    $email = htmlentities(addslashes($_POST["email"]));

    $password = htmlentities(addslashes($_POST["pass"]));

    $resultat->bindParam(1, $email);

    $resultat->bindParam(2, $password);

    $resultat->execute();

    $numeroUsuarisInsertats = $resultat->rowCount();

    /*if ($numeroUsuarisInsertats !=0) {
        

        if (password_verify($password, $numeroUsuarisInsertats['password'])) {

            session_start();

            $_SESSION["email"] = $_POST["email"];
            
            header("Location:opcions.php");
        } else {

            header("Location:login.html");
        }
    }*/

    if ($numeroUsuarisInsertats != 0) {

        session_start();

        $_SESSION["email"] = $_POST["email"];

        header("Location:opcions.php");
    } else {
        header("Location:login.html");
    }
} catch (Exception $e) {
    die("Error" . $e->getMessage());
}


?>