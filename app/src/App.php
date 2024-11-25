<?php
/**
 * Classe de démarrage de l'application
 */

// Déclaration du namespace de ce fichier
namespace App;

use Exception;

class App
{
    // Singleton étape 2 : on crée une propriété statique pour stocker l'instance unique
    // self → fait référence à la classe courante (App)
    // ? devant "self" pour autoriser la valeur "null"
    private static ?self $app_instance = null;
    private string $last_message;

    // Singleton étape 3 : on crée une méthode publique statique qui permet d'obtenir l'instance unique
    public static function getApp(): self
    {
        // Si l'instance n'existe pas, on la crée
        if( is_null( self::$app_instance ) )
        {
            self::$app_instance = new self();
        }

        return self::$app_instance;
    }
    public function toto( string $msg ): void
    {
        $this->last_message = $msg;
        echo $msg . ' Je suis Toto !';
    }

    // Singleton étape 1 : bloquer l'utilisation de new depuis l'extérieur
    // → passer la méthode __construct (le constructeur) en "private"
    private function __construct(){ }

    // Singleton étape 4 : bloquer le clonage de l'instance
    // → passer la méthode __clone en "private"
    private function __clone(){ }

    // Singleton étape 5 : bloquer la désérialisation de l'instance
    // private est interdit dans ce cas, on va lui faire renvoyer une exception
    public function __wakeup()
    {
        throw new Exception( "Impossible de désérialiser une instance de " . __CLASS__ );
    }
}