
<?php


try {
    $connexio = new PDO("mysql:host=localhost;dbname=metalrecords", "root", "");

    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connexio->exec("SET CHARACTER SET utf8");

    $sql = "SELECT * FROM users WHERE email= :email AND password= :pass";

    $resultat = $connexio->prepare($sql);

    $email = htmlentities(addslashes($_POST["email"]));

    $password = htmlentities(addslashes($_POST["pass"]));

    $resultat->bindValue(":email", $email);

    $resultat->bindValue(":pass", $password);

    $resultat->execute();

    $numeroUsuarisInsertats = $resultat->rowCount();

    $registre=$resultat->fetch(PDO::FETCH_ASSOC);

    if(password_verify($password,$registre['password'])){
        echo "Password correcte";
    }

    if ($numeroUsuarisInsertats != 0 ) {

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