<?php 

// Database Connection-------------------------------

function db_con()
{

    $sever = 'localhost';
    $user = 'root';
    $password = '';
    $db = 'pos';

    $con = new mysqli($sever, $user, $password, $db);

    if ($con->connect_error) {
        die("Database Connection" . $con->connect_error);
    }

    return $con;
}

// End Database Connection-------------------------------


?>