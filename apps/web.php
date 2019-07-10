<?php
    $route->get("/", "welcome@index");
    $route->get("/tutorial", "tutorial@index", array(
        "id"
    ));
?>