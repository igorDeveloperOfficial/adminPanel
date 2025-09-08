<?php

$router->get('/','index')->only('auth');
$router->get('/login','login/index')->only('guest');