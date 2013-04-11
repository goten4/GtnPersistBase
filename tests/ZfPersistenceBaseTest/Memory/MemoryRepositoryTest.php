<?php
namespace tests\ZfPersistenceBaseTest\Memory;

use ZfPersistenceBaseTest\AbstractRepositoryTest;
use ZfPersistenceBase\Memory\MemoryRepository;

class MemoryRepositoryTest extends AbstractRepositoryTest
{

    protected function _createRepository()
    {
        return new MemoryRepository();
    }
}
