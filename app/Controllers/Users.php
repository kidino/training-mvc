<?php 

namespace App\Controllers;

class Users extends Controller {

    function user_list() {
        $user_model = new \App\Models\User();
        $users = $user_model->get_all();

        echo $this->templates->render('home::user-list', [ 'users' => $users ]);
    }

    function user_details($id) {
        $user_model = new \App\Models\User();
        $user = $user_model->get_by_id($id);
    
        echo $this->templates->render('home::user', [ 'user' => $user[0] ] );
    }

}