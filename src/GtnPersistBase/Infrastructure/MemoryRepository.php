<?php
namespace GtnPersistBase\Infrastructure;

use GtnPersistBase\Model\AggregateRoot;
use GtnPersistBase\Model\Repository;

class MemoryRepository implements Repository
{
    private $_counter = 1;
    private $_aggregateRoots = array();

    public function add(AggregateRoot $aggregateRoot)
    {
        $aggregateRoot->setId($this->_counter++);
        $this->_aggregateRoots[] = $aggregateRoot;
    }

    public function getAll()
    {
        return $this->_aggregateRoots;
    }

    public function size()
    {
        return count($this->_aggregateRoots);
    }

    public function getById($id)
    {
        foreach ($this->_aggregateRoots as $aggregateRoot) {
            if ($aggregateRoot->getId() == $id) {
                return $aggregateRoot;
            }
        }
        return NULL;
    }

    public function update(AggregateRoot $aggregateRoot)
    {
    }

    public function remove(AggregateRoot $aggregateRoot)
    {
        foreach ($this->_aggregateRoots as $index => $current) {
            if ($current->getId() == $aggregateRoot->getId()) {
                unset($this->_aggregateRoots[$index]);
                break;
            }
        }
    }

    public function removeAll(array $aggregateRoots = NULL)
    {
        if ($aggregateRoots == NULL) {
            unset($this->_aggregateRoots);
            $this->_aggregateRoots = array();
            return;
        }
        foreach ($aggregateRoots as $aggregateRoot) {
            $this->remove($aggregateRoot);
        }
    }
}
