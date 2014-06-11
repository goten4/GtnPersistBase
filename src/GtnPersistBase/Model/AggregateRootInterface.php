<?php
namespace GtnPersistBase\Model;

interface AggregateRootInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param $id
     * @return AggregateRootInterface
     */
    public function setId($id);
}
