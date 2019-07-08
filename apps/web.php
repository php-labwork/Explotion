<?php
    $route->get("/", "welcome@index");
    $route->get("/detail", "welcome@detail", array(
        "id"
    ));
?>