<?php
    require_once dirname(__DIR__, 1)."/vendor/autoload.php";;

    $Loader = new josegonzalez\Dotenv\Loader(dirname(__DIR__, 1) . '\.env');
    // Parse the .env file
    $Loader->parse();
    // Send the parsed .env file to the $_ENV variable
    $Loader->toEnv();
?>