<?php
/**
 * Aqui você deve definir suas configurações de banco de dados, todas de acordo
 * com um determinado ambiente de desenvolvimento. Você pode definir quantos
 * ambientes forem necessários.
 * 
 */

Config::write("database", array(
    "development" => array(
        "driver" => "mysql",
        "host" => "localhost",
        "user" => "root",
        "password" => "",
        "database" => "florencepalmar02",
        "prefix" => ""
    ),
    "production" => array(
        "driver" => "mysql",
        "host" => "mysql12.uni5.net",
        "user" => "florencepalmar02",
        "password" => "183314eu",
        "database" => "florencepalmar02",
        "prefix" => ""
    ),
    "simulation" => array(
        "driver" => "mysql",
        "host" => "mysql12.uni5.net",
        "user" => "florencepalmar02",
        "password" => "183314eu",
        "database" => "florencepalmar02",
        "prefix" => ""
    )    
));

?>
