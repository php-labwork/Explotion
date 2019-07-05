<?php
    namespace MVC;
    date_default_timezone_set("Asia/Jakarta");

    // Config Array
    $configs = array(
        "./config/core",
        "./config/route",
        "./config/db"
    );
    foreach($configs as $item) {
        include_once $item . ".php";
    }

    // Call Core Config
    use MVC\Config\Core as Core;

    $core = new Core();
?>