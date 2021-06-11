<?php
    require_once dirname(__DIR__, 1)."/vendor/autoload.php";;
    
    
    // .env stuff
    $Loader = new josegonzalez\Dotenv\Loader(dirname(__DIR__, 1) . '\.env');
    $Loader->parse();
    $Loader->toEnv();
?>