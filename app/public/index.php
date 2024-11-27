<?php

use App\App;
use Dotenv\Dotenv;

const DS = DIRECTORY_SEPARATOR;
define('ROOT_PATH', dirname(__FILE__, 2) . DS); // Chemin physique du dossier racine
define('APP_PATH', ROOT_PATH . 'src' . DS); // Chemin physique du dossier src 

// Chargement de l'autoloader de Composer
require_once ROOT_PATH . 'vendor' . DS . 'autoload.php';

// Chargement du module .env
Dotenv::createImmutable(ROOT_PATH)->load();

// Démarrage de l'application
App::getApp()->start();
