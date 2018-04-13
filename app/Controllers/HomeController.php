<?php

namespace App\Controllers;

use Slim\Views\Twig as View;

use App\Models\User;

class HomeController extends  Controller {

    public function index($request, $response) {
        // $user = $this->db->table('users')->find(1);
        // var_dump($user->name);

        // $user = User::where('name', 'slim')->first();
        // var_dump($user);

        // User::create([
        //     'email' => 'slim@hotmail.com',
        //     'name' => 'slim',
        //     'password' => 'sdf'
        // ]);

        // die();
        return $this->view->render($response, 'home.twig');
    }
}