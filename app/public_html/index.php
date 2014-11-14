<?php
date_default_timezone_set ( 'Europe/Warsaw' );
ini_set ( 'error_reporting', E_ALL ^ E_NOTICE );
ini_set ( 'display_errors', 'On' );

include '../library/EasyDeployer/EasyDeployer.php';
include '../library/EasyDeployer/HttpRequest.php';

use EasyDeployer\EasyDeployer;
use EasyDeployer\HttpRequest;

$easy_deployer = new EasyDeployer( new HttpRequest() );

$easy_deployer->deploy();
