  Zend Framework 2 DDD Persistence Module
==========================================

## Introduction

**ZfPersistenceBase** is a Zend Framework 2 module providing the basics for persistence
trying to follow [DDD principles](http://domaindrivendesign.org/books/#DDD).

## Requirements

* Zend Framework 2

## Installation

Simply clone this project into your `./vendor/` directory and enable it in your
`./config/application.config.php` file.

Provided Classes and Interfaces
-------------------------------

* `ZfPersistenceBase\Model\AggregateRoot` - Interface defining an aggregate root (getId() method).
* `ZfPersistenceBase\Model\Repository` - Interface defining the minimum set of methods a repository must implements.
* `ZfPersistenceBase\Infrastructure\MemoryRepository` - In memory Repository implementation (useful in unit tests context).
* `ZfPersistenceBase\Infrastructure\MemoryRepositoryFactory` - Factory for creating MemoryRepository

## See also

* [ZfPersistenceZendDb](https://github.com/goten4/ZfPersistenceZendDb)
* [ZfPersistenceDoctrineORM](https://github.com/goten4/ZfPersistenceDoctrineORM)
