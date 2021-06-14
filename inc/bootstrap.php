<?php
    require_once dirname(__DIR__, 1)."/vendor/autoload.php";;
    
    // .env stuff
    $Loader = Dotenv\Dotenv::createImmutable(__DIR__);
    $Loader->load();

    // db init
    try{
        $db = new PDO('mysql:host='.$_ENV["SQL_HOST"].';dbname='. $_ENV["SQL_DBNAME"], $_ENV["SQL_USERNAME"], $_ENV["SQL_PASSWORD"]);
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 
    } catch (Exception $e) {
        echo $e;
    }
?>