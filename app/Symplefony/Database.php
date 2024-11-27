<?php

namespace Symplefony;

use Exception;
use PDO;

class Database
{
    private const PDO_OPTIONS = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ];

    // Singleton étape 2 : on crée une propriété statique pour stocker l'instance unique
    private static ?PDO $pdo_instance = null;

    // Singleton étape 3 : on crée une méthode publique statique qui permet d'obtenir l'instance unique
    public static function getPDO(): PDO
    {
        // Si l'instance n'existe pas, on la crée
        if (is_null(self::$pdo_instance)) {
            $dsn = sprintf(
                'mysql:host=%s;dbname=%s',
                $_ENV['db_host'],
                $_ENV['db_name']
            );
            self::$pdo_instance = new PDO($dsn, $_ENV['db_user'], $_ENV['db_pass'], self::PDO_OPTIONS);
        }

        return self::$pdo_instance;
    }

    // Singleton étape 1 : bloquer l'utilisation de new depuis l'extérieur
    private function __construct() {}

    // Singleton étape 4 : bloquer le clonage de l'instance
    private function __clone() {}

    // Singleton étape 5 : bloquer la désérialisation de l'instance
    public function __wakeup()
    {
        throw new Exception("Impossible de désérialiser une instance de " . __CLASS__);
    }
}
