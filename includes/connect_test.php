<?php
DEFINE("USER", "root");
DEFINE("PASSWORD", "");
try{
    $connection = new
    PDO("mysql:host=localhost;dbname=internship_test", USER, PASSWORD);
    $connection->setAttribute
    (PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION );
}
catch(PDOEXCEPTION $e){
    echo $e->getMessage();
    echo "Could not establish a connection.";
}
?>