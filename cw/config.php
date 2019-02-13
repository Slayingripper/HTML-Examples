 <!--<?php
$servername = "localhost";
$username = "root";
$password = "1234";
$dbname="CDLAB";
?> -->
<?php
    DEFINE('DB_HOST', 'localhost');
    DEFINE('DB_NAME', 'CDLAB');
    DEFINE('DB_USER', 'root');
    DEFINE('DB_PASS', '1234');

    try{
        $db = new PDO('mysql:host='.DB_HOST.'; dbname='.DB_NAME, DB_USER, DB_PASS);
    }catch(PDOException $exeption){
        echo $exeption->getMessage(). '<br/>';
        die();
    }
?>