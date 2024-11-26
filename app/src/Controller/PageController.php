<?php

namespace App\Controller;

use Symplefony\View;

class PageController
{
    // page d'accueil
    public function index(): void
    {
        $view = new View('page:home');

        $data = [
            'title' => 'Accueil - Autodingo.com'
        ];

        $view->render($data);
    }

    // mentions légales
    public function legalMentions(): void
    {
        echo 'Mentions légales depuis le Controller.';
    }
}
