<?php

// Chargement de l'autoloader de Composer
require_once '../vendor/autoload.php';

// Déclaration de l'espace de nom des classes que l'on va utiliser
use App\App;

var_dump( App::getApp() );

$truc = App::getApp();
$machin = clone $truc;

$truc->toto( "Truc a dit" );
$truc->toto( "Et ensuite Truc a dit" );
$machin->toto( "Machin a dit" );

var_dump( $truc );
var_dump( $machin );
