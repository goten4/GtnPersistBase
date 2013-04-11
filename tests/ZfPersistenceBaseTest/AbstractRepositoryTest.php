<?php
namespace ZfPersistenceBaseTest;

use ZfPersistenceBase\Entity;

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
    public function canGetById()
    {
        $storedEntity = $this->repository->getById(1);
        
        $this->assertInstanceOf('ZfPersistenceBaseTest\User', $storedEntity);
        $this->assertEquals('John', $storedEntity->getName());
    }

    /** @test */
    public function canGetAll()
    {
        $entities = $this->repository->getAll();
        
        $this->assertInternalType('array', $entities);
        $this->assertEquals(3, count($entities));
    }

    /** @test */
    public function canGetSize()
    {
        $this->assertEquals(3, $this->repository->size());
    }

    /** @test */
    public function canUpdate()
    {
        $entity = $this->repository->getById(1);
        $entity->setName('Jack');
        
        $this->repository->update($entity);
        
        $storedEntity = $this->repository->getById(1);
        $this->assertEquals('Jack', $storedEntity->getName());
    }

    /** @test */
    public function canRemove()
    {
        $entity = $this->repository->getById(1);
        
        $this->repository->remove($entity);
        
        $this->assertEquals(2, $this->repository->size());
        $this->assertNull($this->repository->getById(1));
    }

    /** @test */
    public function canRemoveAllSpecifiedEntities()
    {
        $entity1 = $this->repository->getById(1);
        $entity2 = $this->repository->getById(2);
        $this->repository->removeAll(array(
            $entity1, 
            $entity2
        ));
        
        $this->assertEquals(1, $this->repository->size());
        $this->assertNull($this->repository->getById(1));
        $this->assertNull($this->repository->getById(2));
    }

    /** @test */
    public function canRemoveAllEntities()
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

class User implements Entity
{
    private $id;
    private $name;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
}