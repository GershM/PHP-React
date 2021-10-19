<?php
declare(strict_types=1);

use DateTime;
use PDO;
use Throwable;

/**
 * returns a connection to the database
 * @param bool $forceNewLink
 * @return PDO
 * @throws \Exception
 */
function pdo(bool $forceNewLink=false) : PDO {
    static $_pdo;
    static $lastTimeConnect;

    $date = new DateTime();
    if(!$forceNewLink && $lastTimeConnect && ($date->getTimestamp() >= ($lastTimeConnect + CONNECTION_TIMEOUT)) ) {
        $forceNewLink = true;
    }
    if ($_pdo == null || $forceNewLink) {
        $host = "";
        $database = "";
        $username = "";
        $password = "";
        $_pdo = new PDO(
            sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $database),
            $username,
            $password,
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_TIMEOUT => 180,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_PERSISTENT => false,
            )
        );
        // mysql session timezone - random reverts to SYSTEM instead of value in conf file
        $_pdo->exec("SET @@session.time_zone = \"+00:00\"");
    }
    $lastTimeConnect = $date->getTimestamp();
    return $_pdo;
}

