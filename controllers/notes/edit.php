<?php

use Core\Database;
use Core\App;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $_GET['id']],
)->findOrFail();

authorized($note['user_id'] === $currentUserId);

view('notes/edit.view.php', ['heading' => 'Edit Notes', 'errors' => [], 'note' => $note]);