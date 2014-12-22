<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once 'vendor/autoload.php';

echo '<h1>Test</h1>';

$vine = new \Api\Vine\Client();

print '<pre>';
var_dump($vine->get('timelines/tags/banana'));
print '</pre>';