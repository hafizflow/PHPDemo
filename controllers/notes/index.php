<?php

use Core\Database;

$config = require base_path('config.php');
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->findAll();


view('notes/index.view.php', ['heading' => 'My Notes', 'notes' => $notes]);