<?php

namespace Symplefony;

use Exception;

class Database
{
    // Singleton étape 2 : on crée une propriété statique pour stocker l'instance unique
    private static ?self $db_instance = null;

    // Singleton étape 3 : on crée une méthode publique statique qui permet d'obtenir l'instance unique
    public static function getDb(): self
    {
        // Si l'instance n'existe pas, on la crée
        if( is_null( self::$db_instance ) )
        {
            self::$db_instance = new self();
        }

        return self::$db_instance;
    }

    // Singleton étape 1 : bloquer l'utilisation de new depuis l'extérieur
    private function __construct(){ }

    // Singleton étape 4 : bloquer le clonage de l'instance
    private function __clone(){ }

    // Singleton étape 5 : bloquer la désérialisation de l'instance
    public function __wakeup()
    {
        throw new Exception( "Impossible de désérialiser une instance de " . __CLASS__ );
    }
}