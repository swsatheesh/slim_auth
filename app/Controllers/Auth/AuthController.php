<?php

namespace App\Controllers\Auth;

use App\Controllers\Controller;

class AuthController extends  Controller {
    public function getSignup($request, $response) {
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignup() {
        
    }
}