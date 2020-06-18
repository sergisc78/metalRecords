<?php 

try {
    $connexio = new PDO("mysql:host=localhost;dbname=metalrecords", "root", "");

    $connexio->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $connexio->exec("SET CHARACTER SET utf8");

} catch (Exception $e) {

    die("Error" . $e->getMessage());
    echo " Hi ha un error  a la línia" . $e->getLine();
}
