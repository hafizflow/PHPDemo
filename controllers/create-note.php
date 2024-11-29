<?php

require 'Validator.php';

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Create a new note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = [];


    if (!Validator::string($_POST['content'], 1, 100)) {
        $error['content'] = 'The note must not be longer than 100 characters';
    }

    if (empty($error)) {
        $db->query(
            'INSERT INTO notes (content, user_id) VALUES (:content, :user_id)',
            [
                'content' => $_POST['content'],
                'user_id' => 1
            ]
        );
    }
}

require 'views/create-note.view.php';