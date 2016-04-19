<?php namespace PhalconDoctrineDal;

use Phalcon\Mvc\Micro;
use PhalconDoctrineDal\Controller\RestController;

class Dal{
    protected $app;
    protected $controller;
    public function __construct(){
        $this->app = new Micro();
    }

    public function run(){

        if(!$this->controller){
            $controller = new RestController();
        }

        $this->app->get('/{entity}',[$controller,'collection']);
        $this->app->get('/{entity}/{id}',[$controller,'get']);
        $this->app->patch('/{entity}/{id}',[$controller,'patch']);
        $this->app->delete('/{entity}/{id}',[$controller,'delete']);
        
        $this->app->handle();
    }
}
