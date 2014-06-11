<?php
namespace GtnPersistBase\Model;

interface RepositoryInterface
{
    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return RepositoryInterface
     */
    public function add(AggregateRootInterface $aggregateRoot);

    /**
     * @return array
     */
    public function getAll();

    /**
     * @return int
     */
    public function size();

    /**
     * @param $id
     * @return AggregateRootInterface
     */
    public function getById($id);

    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return RepositoryInterface
     */
    public function update(AggregateRootInterface $aggregateRoot);

    /**
     * @param AggregateRootInterface $aggregateRoot
     * @return RepositoryInterface
     */
    public function remove(AggregateRootInterface $aggregateRoot);

    /**
     * @param array $aggregateRoots
     * @return RepositoryInterface
     */
    public function removeAll(array $aggregateRoots = null);
}
