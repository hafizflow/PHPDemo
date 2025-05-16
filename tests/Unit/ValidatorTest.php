<?php

it('Validate a string' , function () {
    $result = \Core\Validator::string('foobar');
    
    expect($result)->toBeTrue();
});