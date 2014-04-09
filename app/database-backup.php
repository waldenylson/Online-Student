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
        "host" => "mysql.florencepalmares.com",
        "user" => "florencepalmar02",
        "password" => "36621233eu",
        "database" => "florencepalmar02",
        "prefix" => ""
    ),
    "production" => array(
        "driver" => "",
        "host" => "",
        "user" => "",
        "password" => "",
        "database" => "",
        "prefix" => ""
    )    
));

?>
