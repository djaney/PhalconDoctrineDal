<?php
include __DIR__ . '/vendor/autoload.php';
use Phalcon\Mvc\Micro;

use PhalconDoctrineDal\Dal;

$dal = new Dal();
$dal->run();
