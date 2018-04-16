<?php

use App\Middleware\AuthMiddleware;
use App\Middleware\GuestMiddleware;

$app->get('/', 'HomeController:index')->setName('home');

$app->group('', function() {
    $this->get('/auth/signup', 'AuthController:getSignup')->setName('auth.signup');

    $this->post('/auth/signup', 'AuthController:postSignup');

    $this->get('/auth/signin', 'AuthController:getSignin')->setName('auth.signin');

    $this->post('/auth/signin', 'AuthController:postSignin');
})->add(new GuestMiddleware($container));

$app->group('', function() {
    $this->get('/auth/signOut', 'AuthController:getSignOut')->setName('auth.signOut');

    $this->get('/auth/password/change', 'PasswordController:getChangePassword')->setName('auth.password.change');

    $this->post('/auth/password/change', 'PasswordController:postChangePassword');
})->add(new AuthMiddleware($container));


