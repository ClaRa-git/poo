<?php

namespace App\Controller;

use App\Model\UserModel;
use PDO;
use Symplefony\Database;
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

        // // Test de create (à supprimer)
        // $data = [
        //     'email' => 'john@doe.com',
        //     'password' => '123456',
        //     'first_name' => 'John',
        //     'last_name' => 'Doe',
        //     'phone_number' => '06 01 02 03 04'
        // ];
        // $user = new UserModel($data);
        // $new_user = UserModel::create($user);
        // var_dump($new_user);

        $user = UserModel::readOne(24);
        var_dump($user);
    }
}
