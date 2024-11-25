<?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'user_db';

        $con = mysqli_connect($host, $user, $pass, $db, 3307);
    
        if($con)
            {
                echo "Connection Successful";
            }

        else
            die("Connection failed.")

?>