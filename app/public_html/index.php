<?php
date_default_timezone_set ( 'Europe/Warsaw' );
ini_set ( 'error_reporting', 0 );
ini_set ( 'display_errors', 'Off' );

// Define path to application directory
defined('APPLICATION_PATH')
    || define('APPLICATION_PATH', realpath(dirname(dirname(__FILE__))) );

// Ensure library/ is on include_path
set_include_path(implode(PATH_SEPARATOR, array(
    realpath(APPLICATION_PATH . DIRECTORY_SEPARATOR  . 'library'),
    get_include_path(),
)));

require_once '../config.php';
require_once 'EasyDeployer/Config.php';
require_once 'EasyDeployer/Application.php';

use EasyDeployer\Config;
use EasyDeployer\Application;

Config::setConfigArray( $config );

$application = new Application();

try{
	$application->dispatch();
} catch( \Exception $e) {
	echo 'Exception: ' .  $e->getMessage();
}
