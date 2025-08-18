<?php

try {
    //hostname
    define('HOST', 'localhost');

    //database name
    define('DBNAME', 'coffee-blend');

    //database username
    define('USER', 'root');

    //database password
    define('PASS', '');

    $conn = new PDO("mysql:host=" . HOST . ";dbname=" . DBNAME . "", USER, PASS);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $Exception) {
    echo $Exception->getMessage();
}
