<?php

namespace App\Controllers\Auth;


use App\Models\User;
use App\Controllers\Controller;
use Respect\Validation\Validator as v;

class AuthController extends  Controller {

    public function getSignOut($request, $response) {
        $this->auth->logOut();
        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignin($request, $response) {
        return $this->view->render($response, 'auth/signin.twig');
    }

    public function postSignin($request, $response) {
        $auth = $this->auth->attempt(
            $request->getParam('email'),
            $request->getParam('password')
        );

        if (!$auth) {
            return $response->withRedirect($this->router->pathFor('auth.signin'));
        } 

        return $response->withRedirect($this->router->pathFor('home'));
    }

    public function getSignup($request, $response) {
        return $this->view->render($response, 'auth/signup.twig');
    }

    public function postSignUp($request, $response) {
        
        $validation = $this->validator->validate($request, [
            'email' => v::noWhitespace()->notEmpty()->email()->emailAvailable(),
            'name' => v::notEmpty()->alpha(),
            'password' => v::noWhitespace()->notEmpty(),
        ]);

        if ($validation->failed()) {
            return $response->withRedirect($this->router->pathFor('auth.signup'));
        }

        $user = User::create([
            'email' => $request->getParam('email'),
            'name' => $request->getParam('name'),
            'password' => password_hash($request->getParam('password'), PASSWORD_DEFAULT),
        ]);

        $this->auth->attempt($user->email, $request->getParam('password'));

        return $response->withRedirect($this->router->pathFor('home'));
    }
}