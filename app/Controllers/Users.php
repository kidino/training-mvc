<?php 

namespace App\Controllers;

class Users extends Controller {

    function index() {
        $user_model = new \App\Models\User();
        $users = $user_model->get_all();

        echo $this->templates->render('home::user-list', [ 'users' => $users ]);
    }

    function details($id) {
        $user_model = new \App\Models\User();
        $user = $user_model->get_by_id($id);
    
        echo $this->templates->render('home::user-details', [ 'user' => $user[0] ] );
    }

    function store($id) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
        $email = $_POST['email'];

        // array to capture validation errors
        $errors = [];

        // validation checks
        if(!isset($_POST['username']) || (is_null($_POST['username'])) || ($_POST['username'] == '')) {
            $errors[] = 'Invalid username value';
        }

        if(!isset($_POST['email']) || (is_null($_POST['email'])) || ($_POST['email'] == '') || (filter_var($email, FILTER_VALIDATE_EMAIL) == false) ) {
            $errors[] = 'Invalid email';
        }

        if(($password !== '') || ($confirm_password !== '')) {
            if($confirm_password != $password) {
                $errors[] = 'Passwords need to match. Or leave empty to not change.';
            }
        }

        $user_model = new \App\Models\User();

        if(count($user_model->get_by_email($email, $id)) > 0 ) {
            $errors[] = 'Email is already been used.';
        }

        if(count($user_model->get_by_username($username, $id)) > 0) {
            $errors[] = 'Username is already been used.';
        }

        // no validation errors -- good to be saved
        if(count($errors) == 0) {
            $to_save = [
                'id' => $id,
                'username' => $username,
                'email' => $email
            ];

            if($password !== '') {
                $to_save['password'] = password_hash($password, PASSWORD_DEFAULT);
            }

            $user = $user_model->save($to_save);
            header('Location: /user/'. $id .'?saved=1');
        }

        $user = $user_model->get_by_id($id);
        // reload the register page with the validation errors
        echo $this->templates->render('home::user-details', [ 'data' => $_POST, 'errors' => $errors, 'user' => $user[0]]);
    }

}