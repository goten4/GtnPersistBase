<?php
namespace ZfPersistenceBaseTest;

use Zend\ServiceManager\ServiceManager;
use Zend\Mvc\Service\ServiceManagerConfig as MvcServiceManagerConfig;

/**
 * Utility used to retrieve a freshly bootstrapped application's service manager
 *
 * @license MIT
 * @link    http://www.doctrine-project.org/
 * @author  Marco Pivetta <ocramius@gmail.com>
 */
class ServiceManagerFactory
{
    /**
     * @var array
     */
    protected static $config;

    /**
     * @param array $config
     */
    public static function setConfig(array $config)
    {
        static::$config = $config;
    }

    /**
     * Builds a new service manager
     *
     * @return \Zend\ServiceManager\ServiceManager
     */
    public static function getServiceManager($config = null)
    {
        $config = $config ?: static::$config;
        $smConfig = isset($config['service_manager']) ? $config['service_manager'] : array();
        $serviceManager = new ServiceManager(new MvcServiceManagerConfig($smConfig));
        $serviceManager->setService('ApplicationConfig', $config);
        $serviceManager->get('ModuleManager')->loadModules();
        return $serviceManager;
    }
}