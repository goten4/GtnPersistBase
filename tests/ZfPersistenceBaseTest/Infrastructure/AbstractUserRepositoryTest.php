<?php
namespace ZfPersistenceBaseTest\Infrastructure;

use ZfPersistenceBaseTest\ServiceManagerFactory;
use ZfPersistenceBaseTest\Model\User;

abstract class AbstractUserRepositoryTest extends \PHPUnit_Framework_TestCase
{
    protected static $serviceManager;
    
    public static function setUpBeforeClass()
    {
        static::$serviceManager = ServiceManagerFactory::getServiceManager();
    }

    protected function setUp()
    {
        $this->repository = static::$serviceManager->get('ZfPersistence\UserRepository');
        $this->populate();
    }

    /** @test */
    public function canAdd()
    {
        $this->repository->add(new User('Bill'));
        
        $this->assertEquals(4, $this->repository->size());
    }

    /** @test */
    public function cannotGetByUnknownId()
    {
        $this->assertNull($this->repository->getById(99));
    }

    /** @test */
    public function canGetById()
    {
        $storedAggregateRoot = $this->repository->getById(1);
        
        $this->assertInstanceOf('ZfPersistenceBaseTest\Model\User', $storedAggregateRoot);
        $this->assertEquals('John', $storedAggregateRoot->getName());
    }

    /** @test */
    public function canGetAll()
    {
        $aggregateRoots = $this->repository->getAll();
        
        $this->assertInternalType('array', $aggregateRoots);
        $this->assertEquals(3, count($aggregateRoots));
        $this->assertInstanceOf('ZfPersistenceBaseTest\Model\User', $aggregateRoots[0]);
    }

    /** @test */
    public function canGetSize()
    {
        $this->assertEquals(3, $this->repository->size());
    }

    /** @test */
    public function canUpdate()
    {
        $aggregateRoot = $this->getAggregateRootById(1)->setName('Jack');
        
        $this->repository->update($aggregateRoot);
        
        $this->assertEquals('Jack', $this->getAggregateRootById(1)->getName());
    }

    /** @test */
    public function canRemove()
    {
        $aggregateRoot = $this->getAggregateRootById(1);
        
        $this->repository->remove($aggregateRoot);
        
        $this->assertEquals(2, $this->repository->size());
        $this->assertNull($this->repository->getById(1));
    }

    /** @test */
    public function canRemoveAllSpecifiedAggregateRoots()
    {
        $aggregateRoot1 = $this->getAggregateRootById(1);
        $aggregateRoot2 = $this->getAggregateRootById(2);
        $this->repository->removeAll(array(
            $aggregateRoot1, $aggregateRoot2
        ));
        
        $this->assertEquals(1, $this->repository->size());
        $this->assertNull($this->repository->getById(1));
        $this->assertNull($this->repository->getById(2));
    }

    /** @test */
    public function canRemoveAllAggregateRoots()
    {
        $this->repository->removeAll();
        
        $this->assertEquals(0, $this->repository->size());
    }

    protected function populate()
    {
        $this->addUser('John');
        $this->addUser('Jane');
        $this->addUser('Mike');
    }

    private function getAggregateRootById($id)
    {
        $aggregateRoot = $this->repository->getById($id);
        if ($aggregateRoot == null) {
            $this->fail('Method getById() failed');
        }
        return $aggregateRoot;
    }

    private function addUser($name)
    {
        $user = new User($name);
        $this->repository->add($user);
        return $user;
    }
}
