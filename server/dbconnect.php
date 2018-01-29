<?php
    /**
     * Setting variables to conect through to phpmyadmin database
     * 
     * @var $db_host string - server hostname
     * @var $db_user string - server username to access database
     * @var $db_pwd string - server password to access database
     * @var $db_name string - database name to reference access
     */
    $db_host = "localhost";
    $db_user = "root";
    $db_pwd = "root";
    $db_name = "RegisterAssignment";

    /**
     * Running MYSQLi connection through variable
     * @var $dbConnect array - allows database connection 
     * through authenticating server access via username/password
     */
    $dbConnect = mysqli_connect($db_host, $db_user, $db_pwd, $db_name);

    if (mysqli_connect_errno()){
        echo "<p class='font-white'>Connection to database: " . $db_name . ", returned error: " . mysqli_connect_errno() . "</p>";
    }