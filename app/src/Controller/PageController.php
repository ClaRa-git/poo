<?php

namespace App\Controller;

use App\Model\UserModel;
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

        // Test du UserModel  (à supprimer après)
        $bdd = [
            'id' => 5,
            'password' => 'johndoe1234',
            'firstname' => 'John',
            'lastname' => 'Doe',
            'email' => 'john@doe.com'
        ];

        $johndoe = new UserModel($bdd);
        var_dump($johndoe);
    }

    // mentions légales
    public function legalMentions(): void
    {
        echo 'Mentions légales depuis le Controller.';
    }
}
