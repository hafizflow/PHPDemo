<?php

use Core\Database;
use Core\Validator;

$config = require base_path('config.php');
$db = new Database($config['database']);
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
