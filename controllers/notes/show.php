<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserId = 1;

// To find the note with the given id
$id = $_GET['id'];

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $_GET['id']],
)->findOrFail();

authorized($note['user_id'] === $currentUserId);

view('notes/show.view.php', ['heading' => 'Note', 'note' => $note]);