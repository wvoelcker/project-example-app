<?php
use WillV\Project\View;
use ProjectExampleApp\Config\AutoloaderSet;
use ProjectExampleApp\Config\EnvironmentList;

date_default_timezone_set('UTC');
$projectRoot = realpath(__DIR__);

// Set up autoloaders
require_once $projectRoot."/vendor/autoload.php";
require_once $projectRoot."/config/AutoloaderSet.php";
$autoLoaderSet = AutoloaderSet::create($projectRoot);
$autoLoaderSet->register();

// Set up environment
$ACTIVE_ENVIRONMENT = EnvironmentList::create()->findActiveEnvironment();
if (empty($ACTIVE_ENVIRONMENT)) {
	throw new \Exception("No active environment found");
}
// Set up views
View::setDefaultProjectRoot($projectRoot);
