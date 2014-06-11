<?php
namespace GtnPersistBase\Infrastructure\Memory;

use GtnPersistBase\Model\AggregateRootInterface;
use GtnPersistBase\Model\RepositoryInterface;

class Repository implements RepositoryInterface
{
    /**
     * @var int
     */
    private $_counter = 1;

    /**
     * @var array
     */
    private $_aggregateRoots = array();

    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return RepositoryInterface
     */
    public function add(AggregateRootInterface $aggregateRoot)
    {
        $aggregateRoot->setId($this->_counter++);
        $this->_aggregateRoots[] = $aggregateRoot;
        return $this;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->_aggregateRoots;
    }

    /**
     * @return int
     */
    public function size()
    {
        return count($this->_aggregateRoots);
    }

    /**
     * @param $id
     * @return AggregateRootInterface
     */
    public function getById($id)
    {
        foreach ($this->_aggregateRoots as $aggregateRoot) {
            if ($aggregateRoot->getId() == $id) {
                return $aggregateRoot;
            }
        }
        return null;
    }

    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return RepositoryInterface
     */
    public function update(AggregateRootInterface $aggregateRoot)
    {
        return $this;
    }

    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return RepositoryInterface
     */
    public function remove(AggregateRootInterface $aggregateRoot)
    {
        foreach ($this->_aggregateRoots as $index => $current) {
            if ($current->getId() == $aggregateRoot->getId()) {
                unset($this->_aggregateRoots[$index]);
                break;
            }
        }
        return $this;
    }

    /**
     * @param array $aggregateRoots
     * @return RepositoryInterface
     */
    public function removeAll(array $aggregateRoots = NULL)
    {
        if ($aggregateRoots == NULL) {
            unset($this->_aggregateRoots);
            $this->_aggregateRoots = array();
            return $this;
        }
        foreach ($aggregateRoots as $aggregateRoot) {
            $this->remove($aggregateRoot);
        }
        return $this;
    }
}
