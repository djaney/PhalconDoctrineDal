<?php namespace PhalconDoctrineDal\Collection;

use Phalcon\Mvc\Controller;

class RestController extends Controller {
    
    protected $em;

    public function collection($entity){
        echo 'collection: '.$entity;
    }
    public function get($entity, $id){
        echo 'get: '.$entity.'/'.$id;
    }

    public function patch($entity, $id){
        echo 'patch: '.$entity.'/'.$id;
    }

    public function delete($entity, $id){
        echo 'delete: '.$entity.'/'.$id;
    }

    public function setEntitiyManager($em){
        $this->em = $em;
    }
}
