<?php namespace PhalconDoctrineDal\Collection;
use Phalcon\Mvc\Micro;
use Phalcon\Mvc\Micro\Collection;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
/**
 * CacheMiddleware
 *
 * Caches pages to reduce processing
 */
class RestCollection extends Collection
{

    protected $config;
    protected $modelNamespace;

    public function __construct($config)
    {

        $this->config = $config;
        $this->modelNamespace = $config['modelsNamespace'];
        $em = $this->getEntitiyManager();

        $controller = new RestController();
        $controller->setEntitiyManager($em);
        $this->setHandler($controller);
        $this->get('/{entity}','collection');
        $this->get('/{entity}/{id}','get');
        $this->patch('/{entity}/{id}','patch');
        $this->delete('/{entity}/{id}','delete');
    }

    protected function getEntitiyManager(){
        $isDevMode = true;
        $doctrineConfig = Setup::createAnnotationMetadataConfiguration([$this->config['modelsDir']], $isDevMode);
        $conn = $this->config['db'];
        $entityManager = EntityManager::create($conn, $doctrineConfig);
        return $entityManager;
    }
}
