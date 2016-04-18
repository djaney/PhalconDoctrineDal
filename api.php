<?php

use Phalcon\Mvc\Micro;

$app = new Micro();

// Retrieves all robots
$app->get('/api/{entity}/{id:[0-9]+}', function () {

});

$app->handle();
