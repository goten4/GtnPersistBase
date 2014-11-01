<?php
namespace GtnPersistBase\Model;

interface EntityInterface
{
    /**
     * @return mixed
     */
    public function getId();

    /**
     * @param mixed $id
     * @return EntityInterface
     */
    public function setId($id);
}
