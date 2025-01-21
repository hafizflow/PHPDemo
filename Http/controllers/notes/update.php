<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;
$errors = [];

// find the corresponding note
$note = $db->query(
    'Select * FROM notes WHERE id = :id',
    ['id' => $_POST['id']],
)->findOrFail();


// check if the user is authorized to edit the note
authorized($note['user_id'] === $currentUserId);

// validate the form
if (!Validator::string($_POST['content'], 1, 100)) {
    $errors['content'] = 'The note must not be longer than 100 characters';
}

// if no validation error, update the notes in the database table
if(count($errors)) {
    view('notes/edit.view.php', ['heading' => 'Edit Note', 'errors' => $errors, 'note' => $note]);
}

if (empty($errors)) {
    $db->query(
        'Update notes SET content = :content WHERE id = :id',
        [
            'content' => $_POST['content'],
            'id' => $_POST['id'],
        ]
    );

    header('Location: /notes');
    die();
}