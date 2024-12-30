<?php

require base_path('Validator.php');

$config = require base_path('config.php');
$db = new Database($config['database']);
$errors = [];


if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (!Validator::string($_POST['content'], 1, 100)) {
        $errors['content'] = 'The note must not be longer than 100 characters';
    }

    if (empty($errors)) {
        $db->query(
            'INSERT INTO notes (content, user_id) VALUES (:content, :user_id)',
            [
                'content' => $_POST['content'],
                'user_id' => 1
            ]
        );
    }
}

view('notes/create.view.php', ['heading' => 'Create Notes', 'errors' => $errors]);