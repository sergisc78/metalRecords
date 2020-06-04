<?php

$band=$_POST['banda'];
$titol=$_POST['titol'];
$any=$_POST['any'];

try {
   
    $connexio=new PDO("mysql:host=localhost;dbname=metalrecords","root","");

    $connexio->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

    $connexio->exec("SET CHARACTER SET utf8");

    $sql="INSERT INTO albums (nomBanda,titol, any) values (?,?,?)";

    $resultat=$connexio->prepare($sql);

    $resultat->execute(array($band,$titol,$any));

    header("Location.options.php");


} catch (Exception $e) {
    die("Error" . $e->getMessage());
    echo " Hi ha un error  a la línia" . $e->getLine();
}


?>