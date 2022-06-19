<?php 

// database connection-------------------------------

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

// end database connection-------------------------------


// word limit--------------------------------------------

function limit_text($text, $limit) {
    if (str_word_count($text, 0) > $limit) {
        $words = str_word_count($text, 2);
        $pos   = array_keys($words);
        $text  = substr($text, 0, $pos[$limit]) . '...';
    }
    return $text;
}

// end word limit----------------------------------------
