<?php

$config = require 'config.php';
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes WHERE user_id = 1')->findAll();


$heading = 'My Notes';

require 'views/notes/index.view.php';