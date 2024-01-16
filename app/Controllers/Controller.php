<?php
namespace App\Controllers;

class Controller {

    var $templates;

    function __construct() {
        $this->templates = new \League\Plates\Engine('../app/Views');
        $this->templates->addFolder('layout', '../app/Views/layout');
        $this->templates->addFolder('auth', '../app/Views/auth');
        $this->templates->addFolder('home', '../app/Views/home');
        $this->templates->addFolder('member', '../app/Views/member');
    }

}