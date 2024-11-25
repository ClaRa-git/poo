<?php

// Chargement de l'autoloader de Composer
require_once '../vendor/autoload.php';

use MiladRahimi\PhpRouter\Router;

$router = Router::create();

$router->get('/', function () {
    return 'Bonjour page d\'accueil';
});

$router->get('/contact', function () {
    return 'Bonjour page de contact';
});

$router->dispatch();