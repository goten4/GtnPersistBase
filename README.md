  Zend Framework 2 DDD Persistence Module
==========================================
[![Build Status](https://secure.travis-ci.org/goten4/GtnPersistBase.png?branch=master)](http://travis-ci.org/goten4/GtnPersistBase)
[![Coverage Status](https://coveralls.io/repos/goten4/GtnPersistBase/badge.png?branch=master)](https://coveralls.io/r/goten4/GtnPersistBase)

## Introduction

**GtnPersistBase** is a Zend Framework 2 module providing the basics for persistence
trying to follow [DDD principles](http://domaindrivendesign.org/books/#DDD).

## Requirements

* Zend Framework 2

## Installation

Simply clone this project into your `./vendor/` directory and enable it in your
`./config/application.config.php` file.

Provided Classes and Interfaces
-------------------------------

* `GtnPersistBase\Model\AggregateRoot` - Interface defining an aggregate root (getId() method).
* `GtnPersistBase\Model\Repository` - Interface defining the minimum set of methods a repository must implements.
* `GtnPersistBase\Infrastructure\Memory\Repository` - In memory Repository implementation (useful in unit tests context).

## See also

* [GtnPersistZendDb](https://github.com/goten4/GtnPersistZendDb)
* [GtnPersistDoctrineORM](https://github.com/goten4/GtnPersistDoctrineORM)
