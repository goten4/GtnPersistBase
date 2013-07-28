<?php
namespace ZfPersistenceBaseTest\Model;

use ZfPersistenceBase\Model\AggregateRoot;

class User implements AggregateRoot
{
    private $id;
    private $name;

    public function __construct($name = null)
    {
        $this->setName($name);
    }
    
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    public function getArrayCopy()
    {
        return array(
            'id' => $this->getId(),
            'name' => $this->getName(),
        );
    }
    
    public function exchangeArray(array $data)
    {
        $this->setId($data['id']);
        $this->setName($data['name']);
    }
}