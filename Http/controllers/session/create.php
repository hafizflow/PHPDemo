<?php

use Core\Session;

view('session/create.view.php', 
    attributes: ['errors' => Session::get('errors')
]);