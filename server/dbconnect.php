<?php
    /**
     * Setting variables to conect through to phpmyadmin db
     * @var $db_host string - server hostname
     * @var $db_user string - server username to access db
     * @var $db_pwd string - server password to access db
     * @var $db_name string - db name to reference access
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

    // if (mysqli_query($dbConnect, $sql)) {
    //     echo "<p class='font-white'>New record sucessfully added.</p>";
    // } else {
    //     echo "Error: " . sql . "<br>" . mysqli_error($dbConnect);
    // }

    // INSERT INTO users VALUES ('Massey', 'Isaako', 'lasiisaako@gmail.com', '0212533235', '25');