<?php

require_once __DIR__.'/vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$SERVERNAME = '';
$PORT = '';
$DSN = getenv('DB_DSN');
$USERNAME = getenv('DB_USER');
$PASSWORD = getenv('DB_PASSWORD');
$CHARSET = getenv('DB_CHARSET');
if (!$DSN){
    echo 'Invalid Config file. You must have DB_DSN specified'.PHP_EOL;
    exit(0);
}
$DBNAME = '';
$parts = array_map(function ($part) use (&$SERVERNAME, &$DBNAME, &$PORT) {
    $arr = explode('=', $part);
    if ($arr[0] === 'mysql:host') {
        $SERVERNAME = $arr[1];
    } else if ($arr[0] === 'dbname'){
        $DBNAME = $arr[1];
    } else if ($arr[0] === 'port'){
        $PORT = $arr[1];
    }
}, explode(';', $DSN));
try {
    $dbh = new PDO("mysql:host=".$SERVERNAME.';port='.$PORT, $USERNAME, $PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $dbh->exec("CREATE DATABASE IF NOT EXISTS `$DBNAME` DEFAULT CHARACTER SET {$CHARSET} COLLATE {$CHARSET}_unicode_ci;");
    echo "Database \"$DBNAME\" has been successfully created".PHP_EOL;
} catch (PDOException $e) {
    die("DB ERROR: " . $e->getMessage());
}
