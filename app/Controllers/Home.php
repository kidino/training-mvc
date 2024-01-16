<?php 
namespace App\Controllers;

class Home extends Controller {

    function index() {
        echo "<h1>This is Home</h1>";
        echo "<a href='/'>Home</a>";
        echo " | <a href='/about'>About</a>";
    }

    function about() {
        echo $this->templates->render('home::about');
    }

}