<?php

$config = require 'config.php';
$db = new Database($config['database']);

// To find the note with the given id
$id = $_GET['id'];
$heading = 'Note';
$currentUserId = 1;

$note = $db->query(
    'SELECT * FROM notes WHERE id = :id',
    ['id' => $id],
)->findOrFail();

authorized($note['user_id'] === $currentUserId);

require 'views/notes/show.view.php';