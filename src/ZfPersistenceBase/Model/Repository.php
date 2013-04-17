<?php
namespace ZfPersistenceBase\Model;

interface Repository
{
	public function add(AggregateRoot $aggregateRoot);
    public function getAll();
    public function size();
    public function getById($id);
	public function update(AggregateRoot $aggregateRoot);
	public function remove(AggregateRoot $aggregateRoot);
	public function removeAll(array $aggregateRoots = null);
}
