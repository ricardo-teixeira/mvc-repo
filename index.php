<?php

require 'config.php';

// Also spl_autoloader_register
function __autoload($class)
{
	require LIBS . $class .'.php';
}

$app = new Bootstrap();
