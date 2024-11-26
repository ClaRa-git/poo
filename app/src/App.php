<?php
/**
 * Classe de démarrage de l'application
 */

// Déclaration du namespace de ce fichier
namespace App;

use Exception;
use Throwable;

use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;

use App\Controller\PageController;
use App\Controller\AdminController;

final class App
{
    // Singleton étape 2 : on crée une propriété statique pour stocker l'instance unique
    // self → fait référence à la classe courante (App)
    // ? devant "self" pour autoriser la valeur "null"
    private static ?self $app_instance = null;
    
    // Le routeur de l'application
    private Router $router;

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

    // Démarrage de l'application
    public function start(): void
    {
        // Enregistrement des routes
        $this->registerRoutes();

        // Démarrage du routeur
        $this->startRouter();
    }

    // Singleton étape 1 : bloquer l'utilisation de new depuis l'extérieur
    // → passer la méthode __construct (le constructeur) en "private"
    private function __construct()
    {
        // Création du routeur
        $this->router = Router::create();
    }

    // Enregistrement des routes de l'application
    private function registerRoutes(): void
    {
        // Page d'accueil
        $this->router->get( '/', [ PageController::class, 'index' ] );

        // Page d'administration
        $this->router->get( '/admin', [ AdminController::class, 'dashboard' ] );

        // Mentions légales
        $this->router->get( '/mentions-legales', [ PageController::class, 'legalMentions' ] );
    }

    // Démarrage du routeur
    private function startRouter(): void
    {
        try {
            $this->router->dispatch();
        } catch ( RouteNotFoundException $e ) { // Page 404 avec statut HTTP adéquat pour les pages non listées dans les routes
            http_response_code( 404 );
            echo '404 - Not found';
        } catch ( Throwable $e ) { // Erreur 500 avec statut HTTP adéquat pour tout autre problème temporaire ou non
            http_response_code( 500 );
            echo '500 - Internal server error';
}
    }

    // Singleton étape 4 : bloquer le clonage de l'instance
    // → passer la méthode __clone en "private"
    private function __clone(){ }

    // Singleton étape 5 : bloquer la désérialisation de l'instance
    // private est interdit dans ce cas, on va lui faire renvoyer une exception
    public function __wakeup() // __wakeup ne peut pas être private, cela crée un warning
    {
        throw new Exception( "Impossible de désérialiser une instance de " . __CLASS__ );
    }
}