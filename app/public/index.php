<?php

// Chargement de l'autoloader de Composer
require_once '../vendor/autoload.php';

use MiladRahimi\PhpRouter\Router;
use MiladRahimi\PhpRouter\Exceptions\RouteNotFoundException;
use Laminas\Diactoros\Response\HtmlResponse;

$router = Router::create();

$router->get( '/', function () {
    return 'Bonjour page d\'accueil';
});

$router->get( '/contact', function () {
    return 'Bonjour page de contact';
});

try {
    $router->dispatch();
} catch ( RouteNotFoundException $e ) { // Page 404 avec statut HTTP adéquat pour les pages non listées dans les routes
    http_response_code( 404 );
    echo '404 - Not found';
} catch ( Throwable $e ) { // Erreur 500 avec statut HTTP adéquat pour tout autre problème temporaire ou non
    http_response_code( 500 );
    echo '500 - Internal server error';
}