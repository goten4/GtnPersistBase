<?php
namespace ZfPersistenceBase\Model;

interface AggregateRoot
{
    public function getId();
    public function getArrayCopy();
    public function exchangeArray(array $data);
}
