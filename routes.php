<?php

//? Static pages
$router->get('/', 'controllers/index.php');
$router->get('/about', 'controllers/about.php');
$router->get('/contact', 'controllers/contact.php');
$router->get('/hello', 'controllers/hello.php');


//? Notes related pages
$router->get('/notes', 'controllers/notes/index.php');
$router->get('/notes/create', 'controllers/notes/create.php');
$router->get('/note', 'controllers/notes/show.php');