<?php
namespace GtnPersistBase\Model;

interface Repository
{
    /**
     * @param AggregateRoot $aggregateRoot
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
     */
    public function update(AggregateRoot $aggregateRoot);

    /**
     * @param AggregateRoot $aggregateRoot
     */
    public function remove(AggregateRoot $aggregateRoot);

    /**
     * @param array $aggregateRoots
     */
    public function removeAll(array $aggregateRoots = null);
}
