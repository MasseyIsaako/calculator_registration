<?php
    /**
     * Setting variables to conect through to phpmyadmin db
     * @var
     */
    $db_host = "localhost";
    $db_user = "root";
    $db_pwd = "root";
    $db_name = "RegisterAssignment";

    /**
     * Running MYSQLi connection through variable
     * @var
     */
    $dbConnect = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);

    if (mysqli_connect_errno()) {
        echo "<p class='font-white'>Connection to database: " . $db_name . ", returned error: " . mysqli_connect_errno() . "</p>";
    }

    // INSERT INTO users VALUES ('Massey', 'Isaako', 'lasiisaako@gmail.com', '0212533235', '25');