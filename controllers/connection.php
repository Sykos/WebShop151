<?php
    // Include config file
    /* Database credentials. Assuming you are running MySQL
    server with default setting (user 'root' with no password) */
    define('DB_SERVER', '127.0.0.1:49386');
    define('DB_USERNAME', 'azure');
    define('DB_PASSWORD', '6#vWHD_$');
    define('DB_NAME', 'raclettev2');

    /* Attempt to connect to MySQL database */
    $dbconnect = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($dbconnect === false)
    {
        die("Database connection failed: " . mysqli_connect_error());
    }
