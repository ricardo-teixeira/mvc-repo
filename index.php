<?php

require 'config.php';
require 'util/Auth.php';

// Also spl_autoloader_register
function __autoload($class)
{
	require LIBS . $class .'.php';
}

$app = new Bootstrap();
