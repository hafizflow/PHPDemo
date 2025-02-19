<?php

use Http\Forms\LoginForm;
use Core\Authenticator;


$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();

if( $form->validate($email, $password)) {

    if((new Authenticator)->attempt($email, $password)){
        redirect('/');
    } 
    $form->error('email', 'No matching account found for that email and password');
    
}

return view('session/create.view.php', 
        ['errors' => $form->errors()
    ]
);