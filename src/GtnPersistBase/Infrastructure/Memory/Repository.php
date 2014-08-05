<?php
namespace GtnPersistBase\Infrastructure\Memory;

use GtnPersistBase\Model\AggregateRootInterface;
use GtnPersistBase\Model\RepositoryInterface;

class Repository implements RepositoryInterface
{
    /** @var int */
    protected $counter = 1;

    /** @var AggregateRootInterface[] */
    protected $aggregateRoots = array();

    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return RepositoryInterface
     */
    public function add(AggregateRootInterface $aggregateRoot)
    {
        $aggregateRoot->setId($this->counter++);
        $this->aggregateRoots[] = $aggregateRoot;
        return $this;
    }

    /**
     * @return array
     */
    public function getAll()
    {
        return $this->aggregateRoots;
    }

    /**
     * @return int
     */
    public function size()
    {
        return count($this->aggregateRoots);
    }

    /**
     * @param $id
     * @return AggregateRootInterface
     */
    public function getById($id)
    {
        foreach ($this->aggregateRoots as $aggregateRoot) {
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
        foreach ($this->aggregateRoots as $index => $current) {
            if ($current->getId() == $aggregateRoot->getId()) {
                unset($this->aggregateRoots[$index]);
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
            unset($this->aggregateRoots);
            $this->aggregateRoots = array();
            return $this;
        }
        foreach ($aggregateRoots as $aggregateRoot) {
            $this->remove($aggregateRoot);
        }
        return $this;
    }

    /**
     * Set AggregateRoots.
     *
     * @param \GtnPersistBase\Model\AggregateRootInterface[] $aggregateRoots
     * @return Repository
     */
    public function setAggregateRoots($aggregateRoots)
    {
        $this->aggregateRoots = $aggregateRoots;
        return $this;
    }

    /**
     * Get AggregateRoots.
     *
     * @return \GtnPersistBase\Model\AggregateRootInterface[]
     */
    public function getAggregateRoots()
    {
        return $this->aggregateRoots;
    }

    /**
     * Set Counter.
     *
     * @param int $counter
     * @return Repository
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
        return $this;
    }

    /**
     * Get Counter.
     *
     * @return int
     */
    public function getCounter()
    {
        return $this->counter;
    }
}
