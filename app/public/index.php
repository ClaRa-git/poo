<?php

// Chargement de l'autoloader de Composer
require_once '../vendor/autoload.php';

// Déclaration de l'espace de nom des classes que l'on va utiliser
use App\App;

$truc = new App();

$truc->toto(); // Affiche "Je suis Toto"
