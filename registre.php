
    <?php

    $mail = $_POST["email"];
    $password = $_POST["password"];
    $confirmarPass = $_POST["confirmarPass"];

    $pass_xifrat=password_hash($password,PASSWORD_DEFAULT);
    $confirmPass_xifrat=password_hash($confirmarPass,PASSWORD_DEFAULT);

    try {
        $connexio = new PDO("mysql:host=localhost;dbname=metalrecords", "root", "");

        $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $connexio->exec("SET CHARACTER SET utf8");

        $sql="INSERT INTO users (email,password,confirmarPass) values(:mail,:password,:confirmarPass)";

        $resultat=$connexio->prepare($sql);

        $resultat->execute(array(":mail"=>$mail,":password"=>$pass_xifrat,":confirmarPass"=>$confirmPass_xifrat));

        header("location:opcions.html");

        $resultat->closeCursor();

    } catch (Exception $e) {

        die("Error" . $e->getMessage());
        echo " Hi ha un error  a la línia" . $e->getLine();
    }

    ?>
