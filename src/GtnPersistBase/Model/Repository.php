<?php
namespace GtnPersistBase\Model;

interface Repository
{
    /**
     * @param AggregateRoot $aggregateRoot
     * @return Repository
     */
    public function add(AggregateRoot $aggregateRoot);

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
     * @return AggregateRoot
     */
    public function getById($id);

    /**
     * @param AggregateRoot $aggregateRoot
     * @return Repository
     */
    public function update(AggregateRoot $aggregateRoot);

    /**
     * @param AggregateRoot $aggregateRoot
     * @return Repository
     */
    public function remove(AggregateRoot $aggregateRoot);

    /**
     * @param array $aggregateRoots
     * @return Repository
     */
    public function removeAll(array $aggregateRoots = null);
}
