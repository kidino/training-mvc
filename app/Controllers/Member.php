<?php 
namespace App\Controllers;

class Member extends Controller {

    function index() {

        echo $this->templates->render('member::index', [ 'user' => $_SESSION['user'] ]);
    }
}