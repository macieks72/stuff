<?php
require_once 'vendor/autoload.php';

use MyClasses\View;

$view = new View();
$data = [
    'firstname' => 'Maciej',
    'testvar' => ' timestamp: '.time()
];
$view->Render('test.blade.php', $data);
