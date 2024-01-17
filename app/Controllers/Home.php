<?php 
namespace App\Controllers;

class Home extends Controller {

    function index() {
        echo "<h1>This is Aminurahim</h1>";
        echo "<a href='/'>Home</a>";
        echo " | <a href='/about'>About</a>";
    }

    function about() {
        echo $this->templates->render('home::about');
    }

    function not_found() {
        header('HTTP/1.1 404 Not Found');
        echo $this->templates->render('home::404');
    }
}