<?php namespace PhalconDoctrineDal\Collection;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\Collection;
/**
 * CacheMiddleware
 *
 * Caches pages to reduce processing
 */
class RestCollection extends Collection
{
    public function __construct()
    {
        $this->setHandler(new RestController());
        $this->get('/{entity}','collection');
        $this->get('/{entity}/{id}','get');
        $this->patch('/{entity}/{id}','patch');
        $this->delete('/{entity}/{id}','delete');
    }
}
