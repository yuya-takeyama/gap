<?php
require_once dirname(__FILE__) . '/../vendor/SplClassLoader.php';
$loader = new SplClassLoader('Gap', dirname(__FILE__) . '/../src');
$loader->setNamespaceSeparator('_');
$loader->register();
