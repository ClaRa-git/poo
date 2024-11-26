<?php

namespace App\Controller;

use Symplefony\View;

class AdminController
{
    // page d'accueil de l'administration
    public function dashboard(): void
    {
        $view = new View( 'page:admin:home' );

        $view->render();
    }
}