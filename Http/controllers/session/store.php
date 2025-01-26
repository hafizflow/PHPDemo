<?php

use Core\Database;
use Core\App;
use Http\Forms\LoginForm;


$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);


$form = new LoginForm();

if(! $form->validate($email, $password)){
    return view('session/create.view.php', 
        ['errors' => $form->errors()
    ]);
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