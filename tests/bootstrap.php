<?php
require_once dirname(__FILE__) . '/../vendor/SplClassLoader.php';
$loader = new SplClassLoader('Gap', dirname(__FILE__) . '/../src');
$loader->setNamespaceSeparator('_');
$loader->register();

set_include_path(
    get_include_path() .
    PATH_SEPARATOR .
    dirname(__FILE__) . '/../vendor/mlively/Phake/src'
);

require_once dirname(__FILE__) . '/../vendor/mlively/Phake/src/Phake.php';
