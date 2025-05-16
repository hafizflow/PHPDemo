<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$numbers = new Collection([1, 2, 3, 4, 5]);


if($numbers->contains(3)) {
    echo "The collection contains the number 3.";
} else {
    echo "The collection does not contain the number 3.";
}
// die(var_dump($numbers));