<?php
class DatabasePDO
{
    /** @var PDO */
    private static $dbh;

    public static function getInstance()
    {
        $dsn = Config::DB_TYPE . ':host=' . Config::DB_HOST . ';dbname=' . Config::DB_NAME;
        return new PDO($dsn, Config::DB_USER, Config::DB_PASS);
    }
}

?>