<?php

use Core\Database;
use Core\Validator;
use Core\App;


$db = App::resolve(Database::class);
$errors = [];


if (!Validator::string($_POST['content'], 1, 100)) {
    $errors['content'] = 'The note must not be longer than 100 characters';
}

if (!empty($errors)) {
    return view('notes/create.view.php', ['heading' => 'Create Note', 'errors' => $errors]);
}

if (empty($errors)) {
    $db->query(
        'INSERT INTO notes (content, user_id) VALUES (:content, :user_id)',
        [
            'content' => $_POST['content'],
            'user_id' => 1
        ]
    );

    header('Location: /notes');
    die();
}
