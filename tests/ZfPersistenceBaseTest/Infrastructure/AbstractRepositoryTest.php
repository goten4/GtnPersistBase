<?php
namespace ZfPersistenceBaseTest\Infrastructure;

use ZfPersistenceBaseTest\Model\User;

abstract class AbstractRepositoryTest extends \PHPUnit_Framework_TestCase
{

    protected abstract function _createRepository();

    protected function setUp()
    {
        $this->repository = $this->_createRepository();
        $this->_populate();
    }

    /** @test */
    public function canAdd()
    {
        $this->repository->add(new User());
        
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
    }

    /** @test */
    public function canGetSize()
    {
        $this->assertEquals(3, $this->repository->size());
    }

    /** @test */
    public function canUpdate()
    {
        $aggregateRoot = $this->repository->getById(1);
        $aggregateRoot->setName('Jack');
        
        $this->repository->update($aggregateRoot);
        
        $storedAggregateRoot = $this->repository->getById(1);
        $this->assertEquals('Jack', $storedAggregateRoot->getName());
    }

    /** @test */
    public function canRemove()
    {
        $aggregateRoot = $this->repository->getById(1);
        
        $this->repository->remove($aggregateRoot);
        
        $this->assertEquals(2, $this->repository->size());
        $this->assertNull($this->repository->getById(1));
    }

    /** @test */
    public function canRemoveAllSpecifiedAggregateRoots()
    {
        $aggregateRoot1 = $this->repository->getById(1);
        $aggregateRoot2 = $this->repository->getById(2);
        $this->repository->removeAll(array(
            $aggregateRoot1, 
            $aggregateRoot2
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

    private function _populate()
    {
        $this->_addUser('John');
        $this->_addUser('Jane');
        $this->_addUser('Mike');
    }

    private function _addUser($name)
    {
        $user = new User();
        $user->setName($name);
        $this->repository->add($user);
        return $user;
    }
}
