<?php

require 'config.php';
require 'util/Auth.php';

// Also spl_autoloader_register
function __autoload($class)
{
	require LIBS . $class .'.php';
}

// Load the Bootstrap
$bootstrap = new Bootstrap();

// Optional Path Settings
//$bootstrap->setControllerPath('');
//$bootstrap->setModelPath('');
//$bootstrap->setDefaultFile('index.php');
//$bootstrap->setErrorFile('error.php');

$bootstrap->init();