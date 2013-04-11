<?php
namespace ZfPersistenceBaseTest\Infrastructure;

use ZfPersistenceBase\Infrastructure\MemoryRepository;

class MemoryRepositoryTest extends AbstractRepositoryTest
{
    protected function _createRepository()
    {
        return new MemoryRepository();
    }
}
