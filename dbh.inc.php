<!--pure php files don't get close tags>
<?php

//data source name, tells which server we are using, db name, host
$dsn="mysql:host=localhost;dbname=MadeToOrder";
$dbusername = "root";
//note about password: video said mac users may need to put "root"
//while windows users may need to put "" empty string
$dbpassword = "root";

//try catch block
try{
    //three different ways to connect: don't do mysql connection for security
    //mysqli is better, only works with mysql tho.
    //Third method is pdo: PHP Data Objects. More flexible. Creates object
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    
    //saying if get error, through exception. put in catch block
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch(PDOException $e){
    echo "Connection failed: " . $e->getMessage();
}

?>