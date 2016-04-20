<?php
include __DIR__ . '/vendor/autoload.php';
use Phalcon\Mvc\Micro;
use Phalcon\DI\FactoryDefault;
use PhalconDoctrineDal\Collection\RestCollection;

$app = new Micro();
$di = new FactoryDefault();
$app->setDI($di);
$app->mount(new RestCollection([
    'db'=>[
        'driver'=>'pdo_sqlite',
        'memory'=>true,
    ],
    'modelsDir'=>__DIR__ . '/Test/Entity',
    'modelsNamespace'=>"\\Test\\Entitiy\\",

]));

$app->notFound(function () use ($app) {
    $app->response->setStatusCode(404, "Not Found")->sendHeaders();
    echo 'This is crazy, but this page was not found!';
});


$app->handle();
