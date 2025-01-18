<?php

use Core\Database;
use Core\Validator;
use Core\App;

$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs
$errors = [];
if(! Validator::email($email)) {
    $errors['email'] = 'Invalid email address';
}

if(! Validator::string($password, 4, 255)) {
    $errors['password'] = 'Password must be at least 6 characters';
}

if(! empty($errors)) {
    return view('registration/create.view.php', ['errors' => $errors]);
}

// check if the account already exists
$db = App::resolve(Database::class);

$user = $db->query('select * from users where email = :email', ['email' => $email])->find();

    // if yes redirect to login
    if($user) {
        header('Location: /');
        exit;
    } 
    // if not, save the user in database, login and redirect to dashboard
    else {
        $db->query('INSERT INTO users (email, password) VALUES (:email, :password)',[
            'email' => $email,
            'password' => password_hash($password, PASSWORD_BCRYPT)
        ]);

        login($user);

        header('Location: /');
        exit;
    }