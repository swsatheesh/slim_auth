<?php

$app->get('/', 'HomeController:index');

$app->get('/auth/signup', 'AuthController:getSignup')->setName('auth.signup');