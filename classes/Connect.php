<?php

class Connect
{
    public function connect()
    {
        $db_host = "localhost";
        $db_name = "sons_ecommerce";
        $db_user = "tommy_admin";
        $db_pass = "OK(zAvh(P)_[GeX8";

        $dsn = 'mysql:host=' . $db_host . ";dbname=" . $db_name . ";charset=utf8";

        $conn = new PDO($dsn, $db_user, $db_pass);

        try {
            $db = new PDO($dsn, $db_user, $db_pass);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}