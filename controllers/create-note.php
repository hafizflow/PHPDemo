<?php

$heading = 'Create a new note';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    dd($_POST);
}

require 'views/create-note.view.php';