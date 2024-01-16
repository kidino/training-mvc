<?php
// load the router

use \App\Lib\Utils;

$router = new \Bramus\Router\Router();

$router->get('/', 'App\Controllers\Home@index');
$router->get('/about', 'App\Controllers\Home@about');

// auth related URLs
$router->get('/login', 'App\Controllers\Auth@login');
$router->get('/register', 'App\Controllers\Auth@register');
$router->post('/register', 'App\Controllers\Auth@do_register');
$router->post('/login', 'App\Controllers\Auth@do_login');
$router->get('/logout', 'App\Controllers\Auth@logout');

// user -- admin only page
$router->get('/user/(\d+)', 'App\Controllers\Users@user_details');
$router->get('/user', 'App\Controllers\Users@user_list');

// member's only page
$router->get('/member', 'App\Controllers\Member@index');

// middleware -- protecting all URLs that start with /member
$router->before('GET|POST', '/member.*' , function() {
    Utils::no_cache_headers();
    Utils::check_login_redirect();
});

// middleware -- protecting all URLs that start with /user
$router->before('GET|POST', '/user.*', function() {
    Utils::no_cache_headers();
    Utils::check_login_redirect();

    if( Utils::is_role('admin') == false ) {
        $templates = new \League\Plates\Engine('../app/Views/home');
        $templates->addFolder('layout', '../app/Views/layout');

        echo $templates->render('invalid');
        exit;
    }
});


// run router
$router->run();