<?php
namespace ZfPersistenceBase\Infrastructure;

use Zend\ServiceManager\FactoryInterface;

class MemoryRepositoryFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new MemoryRepository();
    }
}