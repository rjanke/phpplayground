<?php
    /**
     * PDO database connection:
     */

    // Local
    $dbname = "playground";
    $db_username = "homestead";
    $db_password = "secret";
    $host = "playground.test";

    // Remote
    // $dbname = "";
    // $db_username = "";
    // $db_password = "";
    // $host = "";

    try
    {
        $dbcon = new PDO('mysql:host='.$host.';dbname='.$dbname.'', $db_username, $db_password);

        $dbcon->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        $PDO_error = 'ERROR: ' . $e->getMessage();
    }
?>
