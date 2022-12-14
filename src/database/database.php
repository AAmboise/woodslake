<?php

namespace Src\Database;
use Src\Configuration\configuration;

class DataBase {
    private static $pdo;
    public static function getPDO() {
        if (self::$pdo === null) {
            // Récupération des paramètres de configuration BD
            $dsn = Configuration::get("dsn");
            $login = Configuration::get("user");
            $mdp = Configuration::get("password");
            // Création de la connexion
            self::$pdo = new \PDO($dsn, $login, $mdp, 
                    array(\PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION));
        }
        return self::$pdo;
    }
}
