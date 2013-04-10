<?php
namespace ZfPersistenceBase\Memory;

use ZfPersistenceBase\Entity;
use ZfPersistenceBase\Repository;

class MemoryRepository implements Repository
{
    private $_counter = 1;
    private $_entities = array();

    public function add(Entity $entity)
    {
        $entity->setId($this->_counter++);
        $this->_entities[] = $entity;
    }

    public function getAll()
    {
        return $this->_entities;
    }

    public function size()
    {
        return count($this->_entities);
    }

    public function getById($id)
    {
        foreach ($this->_entities as $entity) {
            if ($entity->getId() == $id) {
                return $entity;
            }
        }
        return NULL;
    }

    public function update(Entity $entity)
    {
    }

    public function getBy(array $criteria)
    {
        throw new \Exception('Method getBy() is not implemented in \ZfPersistenceBase\Memory\MemoryRepository');
    }

    public function getAllBy(array $criteria)
    {
        throw new \Exception('Method getAllBy() is not implemented in \ZfPersistenceBase\Memory\MemoryRepository');
    }

    public function remove(Entity $entity)
    {
        foreach ($this->_entities as $index => $current) {
            if ($current->getId() == $entity->getId()) {
                unset($this->_entities[$index]);
                return;
            }
        }
    }

    public function removeAll(array $entities = null)
    {
    }
}
