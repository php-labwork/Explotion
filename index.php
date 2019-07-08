<?php
    namespace MVC;
    date_default_timezone_set("Asia/Jakarta");

    // Config Array
    $configs = array(
        "./config/core",
        "./config/route",
        "./config/db",
        "./config/controller",
        "./config/request"
    );
    foreach($configs as $item) {
        include_once $item . ".php";
    }

    // Call Core Config
    use MVC\Config\Core as Core;

    $core = new Core();
    $route = $core->route();

    // Route Configuration
    include_once "apps/web.php";
    $route->call();
?>