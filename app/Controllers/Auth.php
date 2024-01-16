<?php 
namespace App\Controllers;
use \App\Models\User;

class Auth extends Controller {

    function login() {
        echo $this->templates->render('auth::login');
    }

    function register() {
        echo $this->templates->render('auth::register');
    }

    function do_register() {
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

        if(!isset($_POST['password']) || (is_null($_POST['password'])) || ($_POST['password'] == '') || (strlen($_POST['password']) < 6 ) ) {
            $errors[] = 'Invalid password. Password needs to be a minimum of 6 characters long.';
        }

        if(!isset($_POST['email']) || (is_null($_POST['email'])) || ($_POST['email'] == '') || (filter_var($email, FILTER_VALIDATE_EMAIL) == false) ) {
            $errors[] = 'Invalid email';
        }

        if($password !== $confirm_password) {
            $errors[] = 'Passwords need to match.';
        }

        $user_model = new User();

        if(count($user_model->get_by_email($email)) > 0 ) {
            $errors[] = 'Email is already been used.';
        }

        if(count($user_model->get_by_username($username)) > 0) {
            $errors[] = 'Username is already been used.';
        }

        // no validation errors -- good to be saved
        if(count($errors) == 0) {
            $user = $user_model->save([
                'username' => $username,
                'email' => $email,
                'password' => password_hash($password, PASSWORD_DEFAULT),
            ]);

            header('Location: /login?success=1');
        }

        // reload the register page with the validation errors
        echo $this->templates->render('auth::register', [ 'data' => $_POST, 'errors' => $errors]);

    } // end of do_register

    function do_login() {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $user_model = new User();
        $user = $user_model->get_by_username($username);

        if (
            (count($user) > 0 )
            && (password_verify($password, $user[0]['password']))
         ) {
            $_SESSION['is_loggedin'] = true;
            $_SESSION['user'] = $user[0];
            // echo $this->templates->render('auth::login', [ 'message' => 'Login Successful']);
            header('Location: /member');
            exit();
        }
        echo $this->templates->render('auth::login', [ 'data' => $_POST, 'error' => 'Invalid username or password' ]);
    }

    function logout() {
        unset($_SESSION['user']);
        unset($_SESSION['is_loggedin']);
        header('Location: /login');
    }

}