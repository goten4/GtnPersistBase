<?php
namespace ZfPersistenceBase;

interface Repository
{
	public function add(Entity $entity);
    public function getAll();
    public function getBy(array $criteria);
    public function getAllBy(array $criteria);
    public function size();
    public function getById($id);
	public function update(Entity $entity);
	public function remove(Entity $entity);
	public function removeAll(array $entities = null);
}
