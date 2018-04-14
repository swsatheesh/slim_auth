<?php

$app->get('/', 'HomeController:index')->setName('home');

$app->get('/auth/signup', 'AuthController:getSignup')->setName('auth.signup');

$app->post('/auth/signup', 'AuthController:postSignup');

$app->get('/auth/signin', 'AuthController:getSignin')->setName('auth.signin');

$app->post('/auth/signin', 'AuthController:postSignin');

$app->get('/auth/signOut', 'AuthController:getSignOut')->setName('auth.signOut');


