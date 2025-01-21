<?php

use Core\Database;
use Core\App;
use Core\Validator;


$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);


$errors = [];
if(! Validator::email($email)) {
    $errors['email'] = 'Invalid email address';
}

if(! Validator::string($password)) {
    $errors['password'] = 'Please provide a valid password';
}

if(! empty($errors)) {
    return view('session/create.view.php', ['errors' => $errors]);
}


// Login the user if the credentials are matched
$user = $db->query('select * from users where email = :email', ['email' => $email])->find();

if($user) {
    if( password_verify($password, $user['password']) ) {
    login([
        'email' => $email
    ]);

    header('Location: /');
    exit;
    }
}


return view('session/create.view.php', ['errors' => 'No matching account found for that email and password']);