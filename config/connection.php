<?php
/**
 * Created by PhpStorm.
 * User: alessandro
 * Date: 15/09/18
 * Time: 15:52
 */

use Doctrine\MongoDB\Connection;
use Doctrine\ODM\MongoDB\Configuration;
use Doctrine\ODM\MongoDB\DocumentManager;
use Doctrine\ODM\MongoDB\Mapping\Driver\AnnotationDriver;

$connection = new Connection();

$config = new Configuration();
$config->setProxyDir(__DIR__ . '/Proxies');
$config->setProxyNamespace('Proxies');
$config->setHydratorDir(__DIR__ . '/Hydrators');
$config->setHydratorNamespace('Hydrators');
$config->setDefaultDB('doctrine_odm');
$config->setMetadataDriverImpl(AnnotationDriver::create(__DIR__ . '/../src/Document'));

AnnotationDriver::registerAnnotationClasses();

return DocumentManager::create($connection, $config);