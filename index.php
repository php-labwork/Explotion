<?php
    namespace MVC;
    date_default_timezone_set("Asia/Jakarta");

    // Config Array
    $configs = array(
        "./config/core",
        "./config/route",
        "./config/db",
        "./config/controller",
        "./config/model",
        "./config/request"
    );
    foreach($configs as $item) {
        include_once $item . ".php";
    }

    // Libs Array
    $libs = array(
        "./apps/libs/oauth2"
    );
    foreach($libs as $item) {
        include_once $item . ".php";
    }

    // Call Core Config
    use MVC\Config\Core as Core;

    $core = new Core();
    $route = $core->route();

    // Route Configuration
    include_once "apps/web.php";
    include_once "apps/config.php";
    $route->call();
?>