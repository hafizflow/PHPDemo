<?php

$config = require 'config.php';
$db = new Database($config['database']);

$heading = 'Create a new note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $error = [];

    // dd(strlen($_POST['content']));

    if (strlen($_POST['content']) === 0) {
        $error['content'] = 'You must enter a note';
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