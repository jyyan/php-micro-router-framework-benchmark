<?php
use Siler\Route;

require 'vendor/autoload.php';
Route\get('/', function () {
    echo 'Hello World!';
});
Route\get('/hello/{name}', function ($params) {
    printf('Hello %s', $params['name']);
});
Route\get('/hello-world/{name}', 'examples/hello-world/hello-world.phtml');

require $_SERVER['DOCUMENT_ROOT'].'/php-micro-router-framework-benchmark/libs/output_data.php';