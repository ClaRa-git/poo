<?php

namespace App\Controller;

use Symplefony\View;

class PageController
{
    // page d'accueil
    public function index(): void
    {
        $view = new View();

        $view->render();
    }

    // mentions légales
    public function legalMentions(): void
    {
        echo 'Mentions légales depuis le Controller.';
    }
}